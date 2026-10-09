# Laporan Audit Bug & Optimasi Controller

**Proyek:** Asesmen Diagnostik Non Kognitif (Laravel)
**Ruang Lingkup:** Seluruh `app/Http/Controllers/` + model & migrasi terkait
**Tanggal:** 12 Agustus 2026

---

## Daftar Isi

1. [Ringkasan](#ringkasan)
2. [Bug Fungsional](#bug-fungsional)
3. [Bug Performa (N+1 Query)](#bug-performa-n1-query)
4. [Dead Code & Cleanup](#dead-code--cleanup)
5. [Risiko Keamanan](#risiko-keamanan)
6. [Rekomendasi Optimasi (Prioritas)](#rekomendasi-optimasi-prioritas)
7. [Rencana Implementasi](#rencana-implementasi)

---

## Ringkasan

Total 12 controller diaudit. Ditemukan:

| Kategori | Jumlah |
|----------|--------|
| Bug fungsional (error/kegagalan logika) | 7 |
| Bug performa (N+1 query) | 4 |
| Dead code / duplikasi | 6 |
| Risiko keamanan | 3 |

**3 bug berisiko tertinggi:** error SQL di `PertanyaanController` (#B1), hardcode jumlah soal (#B2), dan IDOR (akses hasil siswa lain tanpa izin, #B3).

---

## Bug Fungsional

### B1. `PertanyaanController.php:40` — Validasi tidak cocok dengan skema DB (Error SQL)

- **Masalah:** Validasi `'category' => 'nullable|string'`, tetapi kolom `category` di tabel `questions` adalah `enum('A', 'B', 'C')` **NOT NULL tanpa default** (lihat migrasi `2025_10_31_003843_create_questions_table.php:24`). Menyimpan pertanyaan tanpa `category` akan memicu error SQL `Field 'category' doesn't have a default value`.
- **Dampak:** Admin tidak bisa menambah pertanyaan bila form mengirim `category` kosong.
- **Perbaikan:**
  - Ubah validasi menjadi `'category' => 'required|in:A,B,C'`, atau
  - Tambahkan default di migrasi: `$table->enum('category', ['A', 'B', 'C'])->default('A')`.
  - Berlaku juga di method `update()`.

### B2. `UserController.php:55` — Total soal di-hardcode = 45

- **Masalah:** `$totalQuestions = 45;` dikeraskan secara manual (44 soal + 1 tracer study). Jika jumlah soal di tabel `questions` berubah (ditambah/dikurangi admin), index ke-44 sebagai titik tracer study menjadi salah, navigasi soal salah, dan progress bar tidak akurat.
- **Dampak:** Kuisioner rusak/tidak konsisten setiap kali data soal diubah.
- **Perbaikan:** Hitung dinamis:
  ```php
  $totalQuestions = Question::count() + 1; // +1 untuk tracer study
  ```
  Dan gunakan `$questionKeys = $questions->keys()->toArray();` yang sudah ada untuk index ke soal terakhir.

### B3. `UserController.php:127,160` — IDOR: hasil siswa dapat diakses siapa saja

- **Masalah:** `hasil()` dan `categoryResult()` menerima `nis` dari query string **tanpa memverifikasi** bahwa NIS tersebut milik session saat ini.
- **Dampak:** Siapa pun (tanpa login) bisa membuka `/hasil?nis=1234` atau `/category-result?nis=1234` dan melihat hasil asesmen siswa lain.
- **Perbaikan:**
  ```php
  if (session('nis') !== $nis) {
      abort(403, 'Anda tidak berhak mengakses data ini.');
  }
  ```

### B4. `UserController.php:29-31` — Generator NIS acak 4 digit rentan collision

- **Masalah:** `random_int(1000, 9999)` hanya 4 digit → kapasitas maksimal ~9.000 siswa. Loop `do-while` dengan `Siswa::where('nis', ...)->exists()` berpotensi berjalan selamanya (infinite loop) saat siswa mendekati kapasitas, dan rawan race condition (dua request bersamaan mendapat NIS sama → insert gagal karena bukan unik di DB, lihat migrasi `2025_11_03_023440_create_siswa_table.php` yang tidak punya unique index pada `nis`).
- **Dampak:** Error pada saat pendaftaran kuisioner massal.
- **Perbaikan:**
  - Perbesar rentang: `random_int(10000000, 99999999)` (8 digit).
  - Tambah unique index di migrasi: `$table->string('nis', 20)->unique();`.
  - Bungkus insert dengan try/catch + retry maksimal 5x untuk collision.

### B5. `AnswerController.php:24` — `Question::find()` bisa mengembalikan `null`

- **Masalah:** Antara validasi (`exists:questions,id`) dan `find()`, soal bisa terhapus → `$question->id_soal` pada baris 31 melempar fatal error `Attempt to read property on null`.
- **Perbaikan:** Gunakan `Question::findOrFail($request->question_id);`

### B6. `HasilController.php:128-131` — `show()` mengembalikan view yang salah

- **Masalah:** `show(Answer $hasil)` melempar `view('admin.hasil.index', compact('hasil'))`, tetapi view `admin.hasil.index` mengharapkan variabel `$groupedAnswers`. Membuka route `hasil/{id}` menghasilkan error/blank page.
- **Perbaikan:** Buat view tersendiri (misal `admin.hasil.detail`) atau hapus method ini dari resource route.

### B7. `AuthController.php:34` — Logout menggunakan method GET

- **Masalah:** Route `/logout` menggunakan GET → rentan CSRF (attacker bisa memaksa logout pengguna melalui `<img src="/logout">`).
- **Perbaikan:** Ubah ke `Route::post('/logout', ...)` + `@csrf` di form, atau `Route::delete(...)`.

---

## Bug Performa (N+1 Query)

### P1. `HasilController.php:15-21` & `:163-169` — Query per-NIS (N+1)

- **Masalah:** Setelah query agregat `groupBy('nis')`, untuk **setiap** NIS dijalankan ulang 1 query penuh:
  ```php
  $answers = Answer::where('nis', $nis)->with('question', 'siswa', 'category')->get();
  ```
  Dengan 500 siswa → 501 query ke DB.
- **Perbaikan:** Satu query agregat lalu proses di PHP:
  ```php
  $rows = Answer::selectRaw('nis, id_option_chosen, COUNT(*) as cnt')
      ->groupBy('nis', 'id_option_chosen')
      ->get();
  $grouped = $rows->groupBy('nis');
  ```
  Ambil data siswa sekaligus: `Siswa::whereIn('nis', $grouped->keys())->get()->keyBy('nis')`.

### P2. `DashboardController.php:27-32` — N+1 yang sama

- **Masalah:** Pola identik dengan P1 (query per NIS untuk menghitung kategori).
- **Perbaikan:** Pakai hasil agregat P1 (bisa dibagi lewat service bersama, lihat R1).

### P3. `UserController.php:149-153` & `:212-216` — Update per baris dalam loop

- **Masalah:** `foreach ($answers as $answer) { $answer->update(...) }` → 1 query update per jawaban.
- **Perbaikan:** Satu query batch:
  ```php
  Answer::where('nis', $nis)->whereNull('nama_siswa')->update(['nama_siswa' => $siswa->nama_siswa]);
  ```
  Solusi lebih baik: isi `nama_siswa` langsung saat `AnswerController::saveAnswer()` (data siswa sudah ada di session).

### P4. Eager load pada query grouped tidak berfungsi

- **Masalah:** `->with('question', 'siswa', 'category')` pada `selectRaw(...)->groupBy(...)` tidak berguna — model hasil groupBy tidak memiliki atribut relasi (id) sehingga eager load tidak berjalan, hanya menambah beban.
- **Perbaikan:** Hapus `with()` dari query agregat; ambil relasi lewat query terpisah dengan `whereIn` (lihat P1).

---

## Dead Code & Cleanup

| Lokasi | Masalah |
|--------|---------|
| `HasilController.php:47-51` & `:195-199` | if/else no-op: `$mostFrequentOptionLetter = $mostFrequentOptionLetter;` — blok ini tidak melakukan apa-apa, hapus. |
| `HasilController.php:59-61` & `:207-209` | `$optionPercentages` dihitung tapi tidak pernah digunakan. |
| `HasilController.php:39,187` | Semicolon ganda: `implode(', ');;` |
| `HasilController.php:40-46,188-194` | Blok komentar lama (logika if/else yang sudah diganti) — hapus. |
| `UserController.php:119` | `session()->forget(['answer_code'])` — session `answer_code` tidak pernah dibuat di aplikasi. |
| Logika kategorisasi duplikat di 3 controller | HasilController, DashboardController, UserController menghitung kategori dengan kode yang sama (copy-paste ~30 baris) — kandidat utama refactor (lihat R1). |

---

## Risiko Keamanan

| # | Lokasi | Risiko |
|---|--------|--------|
| S1 | `UserController.php:125-219` | IDOR — akses hasil siswa lain tanpa otorisasi (detail di B3). |
| S2 | `AuthController.php:34` | Logout via GET rentan CSRF (detail di B7). |
| S3 | `HasilController.php:123,148` | `Answer::create($request->all())` / `update($request->all())` — aman saat ini berkat `$fillable`, tapi lebih baik eksplisit: `$request->only(['answer_code', 'nis', 'nama_siswa', 'id_soal', 'id_option_chosen'])` agar tidak bergantung pada `$fillable` saat model berubah. |
| S4 | `AnswerController.php:27` | `Str::random(10)` pada kolom `answer_code` yang `unique` — probabilitas collision sangat kecil tapi ada; bungkus create dengan try/catch dan retry. |

---

## Rekomendasi Optimasi (Prioritas)

### R1. Buat Service `App\Services\KategoriService` (Prioritas Tertinggi)

Satu tempat untuk logika kategorisasi yang saat ini duplikat di 3 controller:

```php
namespace App\Services;

use App\Models\Answer;
use App\Models\Category;
use Illuminate\Support\Collection;

class KategoriService
{
    /**
     * Kelompokkan jawaban per NIS dan hitung kategori + rekomendasi.
     * Tanpa N+1 — satu query agregat untuk semua siswa.
     */
    public function groupedHasil(): Collection
    {
        $rows = Answer::selectRaw('nis, id_option_chosen, COUNT(*) as cnt')
            ->groupBy('nis', 'id_option_chosen')
            ->get()
            ->groupBy('nis');

        $siswaMap = \App\Models\Siswa::whereIn('nis', $rows->keys())->get()->keyBy('nis');
        $categories = Category::pluck('description', 'name');

        return $rows->map(function ($groups, $nis) use ($siswaMap, $categories) {
            $optionCounts = $groups->pluck('cnt', 'id_option_chosen');
            return $this->buildResult($nis, $siswaMap[$nis] ?? null, $optionCounts, $categories);
        });
    }

    /** Hitung kategori + rekomendasi untuk satu siswa. */
    public function kategoriPerSiswa(int $nis): array
    {
        // ... implementasi serupa untuk UserController
    }

    private function buildResult($nis, $siswa, Collection $optionCounts, $categories): array
    {
        $mostFrequentCount = $optionCounts->max();
        $mostFrequentOptions = $optionCounts->filter(fn ($c) => $c === $mostFrequentCount)->keys()->sort()->values();

        $category = $this->determineCategory($mostFrequentOptions->toArray());

        return [
            'nis' => $nis,
            'kelas' => $siswa->kelas ?? 'N/A',
            'nama_siswa' => $siswa->nama_siswa ?? 'N/A',
            'jawaban_terbanyak' => $this->optionLetters($mostFrequentOptions) . ' (' . $mostFrequentCount . ')',
            'kategori' => $category,
            'rekomendasi' => $categories[$category] ?? 'Belum dapat ditentukan',
        ];
    }

    private function determineCategory(array $options): string
    {
        return match (count($options)) {
            1 => ['1' => 'A', '2' => 'B', '3' => 'C'][$options[0]] ?? 'Belum dapat ditentukan',
            2 => implode(' dan ', array_map(fn ($o) => ['1' => 'A', '2' => 'B', '3' => 'C'][$o], $options)),
            default => 'Belum dapat ditentukan',
        };
    }

    private function optionLetters(Collection $options): string
    {
        $letters = [1 => 'A', 2 => 'B', 3 => 'C'];
        return $options->map(fn ($id) => $letters[$id] ?? '?')->implode(', ');
    }
}
```

Dipakai dari:
- `HasilController::index()` → `(new KategoriService)->groupedHasil()`
- `HasilController::export()` → hasil yang sama (bisa di-cache)
- `DashboardController::index()` → hitung distribusi dari hasil service
- `UserController::categoryResult()` → `kategoriPerSiswa($nis)`

### R2. Hilangkan N+1 Query

- Terapkan P1/P2 dengan service R1 — dashboard & halaman hasil jadi **1–3 query total** (sebelumnya ratusan).

### R3. Perbaiki Authorization (B3)

Cek `session('nis') !== $nis` di `hasil()` dan `categoryResult()`.

### R4. Hapus Hardcode Jumlah Soal (B2)

`$totalQuestions = Question::count() + 1;`

### R5. Generator NIS Aman (B4)

Rentang 8 digit + unique index + retry dengan try/catch.

### R6. Keamanan Auth (B7)

Logout pindah ke POST + `@csrf`.

### R7. Anti Race Condition pada `id_soal` (`PertanyaanController.php:19,44`)

Dua admin yang menambah soal bersamaan bisa mendapat `id_soal` sama → gagal karena kolom `unique`. Perbaikan:

```php
$idSoal = DB::transaction(function () {
    $last = Question::where('id_soal', 'like', 'ADNK%')
        ->orderByRaw('CAST(SUBSTRING(id_soal, 5) AS UNSIGNED) DESC')
        ->lockForUpdate()
        ->value('id_soal');
    $next = $last ? ((int) substr($last, 4)) + 1 : 1;
    return 'ADNK' . str_pad($next, 2, '0', STR_PAD_LEFT);
});
```

Catatan tambahan: `max('id_soal')` bekerja secara *lexicographic* — aman selama 2 digit (≤ ADNK99), tapi salah mulai ADNK100. Gunakan `orderByRaw` di atas untuk konsistensi jangka panjang.

---

## Rencana Implementasi

| Langkah | Aksi | File |
|---------|------|------|
| 1 | Fix bug SQL category (B1) | `PertanyaanController.php`, migrasi `questions` |
| 2 | Fix hardcode total soal (B2) | `UserController.php` |
| 3 | Fix IDOR (B3) | `UserController.php` |
| 4 | Fix generator NIS (B4) | `UserController.php`, migrasi `siswa` |
| 5 | Fix `findOrFail` (B5) | `AnswerController.php` |
| 6 | Fix `show()` view salah (B6) | `HasilController.php`, `routes/web.php` |
| 7 | Logout POST + CSRF (B7) | `AuthController.php`, `routes/web.php`, view login |
| 8 | Buat `KategoriService` (R1) | `app/Services/KategoriService.php` |
| 9 | Refactor 3 controller pakai service (P1–P4) | `HasilController.php`, `DashboardController.php`, `UserController.php` |
| 10 | Batch update `nama_siswa` (P3) | `UserController.php` |
| 11 | Bersihkan dead code | `HasilController.php`, `UserController.php` |
| 12 | Generate `id_soal` aman race (R7) | `PertanyaanController.php` |

> Urutan 1–7 adalah perbaikan bug berisiko tinggi (sebaiknya dikerjakan dulu); 8–12 adalah refactor & optimasi.
