<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Exports\HasilExport;
use Maatwebsite\Excel\Facades\Excel;

class HasilController extends Controller
{
    public function index()
    {
        // ambil data dan digrub berdasarkan NIS dan hitung statistik
        $groupedAnswers = Answer::with('question', 'siswa', 'category')
            ->selectRaw('nis, COUNT(*) as total_answers, COUNT(DISTINCT id_option_chosen) as unique_options')
            ->groupBy('nis')
            ->get()
            ->map(function ($group) {
                $nis = $group->nis;
                $answers = Answer::where('nis', $nis)->with('question', 'siswa', 'category')->get();

                // ambil data No. Pendaftaran dan Nama Siswa
                $namaSiswa = $answers->first()->siswa->nama_siswa ?? 'N/A';

                // Menghitung jawaban terbanyak
                $optionCounts = $answers->groupBy('id_option_chosen')->map->count();
                $mostFrequentCount = $optionCounts->max();
                $mostFrequentOption = $optionCounts->filter(fn ($count) => $count === $mostFrequentCount)->keys();

                $optionToLetter = [
                    1 => 'A',
                    2 => 'B',
                    3 => 'C',
                ];
                // Mengubah ID Jawaban ke Opsi (A, B, C)
                $mostFrequentOptionLetter = $mostFrequentOption->map(fn ($optionId) => $optionToLetter[$optionId] ?? '?')->implode(', ');;
                // if ($mostFrequentOption == 1) {
                //     $mostFrequentOptionLetter = 'A';
                // } elseif ($mostFrequentOption == 2) {
                //     $mostFrequentOptionLetter = 'B';
                // } elseif ($mostFrequentOption == 3) {
                //     $mostFrequentOptionLetter = 'C';
                // }
                if ($mostFrequentOption->count() === 1) {
                    $mostFrequentOptionLetter = $mostFrequentOptionLetter; // satu huruf saja
                } else {
                    $mostFrequentOptionLetter = $mostFrequentOptionLetter; // gabungan huruf (misal "B, C")
                }

                // Jawaban dengan pola tertentu untuk menentukan kategori
                $totalAnswers = $answers->count();
                $category = 'Belum dapat ditentukan';
                $recommendation = 'Belum dapat ditentukan';

                if ($totalAnswers > 0) {
                    $optionPercentages = $optionCounts->map(function ($count) use ($totalAnswers) {
                        return ($count / $totalAnswers) * 100;
                    });

                    // Ambil 2 opsi terbanyak
                    // $sortedOptions = $optionCounts->sortDesc()->keys()->take(2)->toArray();
                    $sortedOptions = $optionCounts
                        ->filter(fn ($count) => $count === $mostFrequentCount)
                        ->keys()
                        ->toArray();

                    // menentukan kategori berdasarkan kombinasi
                    if (count($sortedOptions) == 1) {
                        // Terbanyak dominan 1 jawaban
                        $dominantOption = $sortedOptions[0];
                        $category = $dominantOption == 1 ? 'A' : ($dominantOption == 2 ? 'B' : 'C');
                    } elseif (count($sortedOptions) == 2) {
                        // Kalau jumlah jawaban ada 2 opsi
                        sort($sortedOptions); // Sort to ensure consistent order
                        if ($sortedOptions == [1, 2]) {
                            $category = 'A dan B';
                        } elseif ($sortedOptions == [1, 3]) {
                            $category = 'A dan C';
                        } elseif ($sortedOptions == [2, 3]) {
                            $category = 'B dan C';
                        }
                    }

                    // Tampilkan rekomendasi dari tabel categories
                    $categoryModel = \App\Models\Category::where('name', $category)->first();
                    if ($categoryModel) {
                        $recommendation = $categoryModel->description;
                    }
                }

                return [
                    'nis' => $nis,
                    'nama_siswa' => $namaSiswa,
                    'jawaban_terbanyak' => $mostFrequentOptionLetter . ' (' . $mostFrequentCount . ')',
                    'kategori' => $category,
                    'rekomendasi' => $recommendation,
                    'answers' => $answers, // For modal details
                ];
            });

        return view('admin.hasil.index', compact('groupedAnswers'));
    }

    public function create()
    {
        return view('admin.hasil.tambah-hasil');
    }

    public function store(Request $request)
    {
        $request->validate([
            'answer_code' => 'required|string|max:255|unique:answers,answer_code',
            'nis' => 'required|string|max:255',
            'nama_siswa' => 'required|string|max:255',
            'id_soal' => 'required|string|max:255',
            'id_option_chosen' => 'required|integer',
        ]);

        Answer::create($request->all());

        return redirect()->route('hasil.index')->with('success', 'Hasil berhasil ditambahkan.');
    }

    public function show(Answer $hasil)
    {
        return view('admin.hasil.index', compact('hasil'));
    }

    public function edit(Answer $hasil)
    {
        return view('admin.hasil.edit-hasil', compact('hasil'));
    }

    public function update(Request $request, Answer $hasil)
    {
        $request->validate([
            'answer_code' => 'required|string|max:255|unique:answers,answer_code,' . $hasil->id,
            'nis' => 'required|string|max:255',
            'nama_siswa' => 'required|string|max:255',
            'id_soal' => 'required|string|max:255',
            'id_option_chosen' => 'required|integer',
        ]);

        $hasil->update($request->all());

        return redirect()->route('hasil.index')->with('success', 'Hasil berhasil diperbarui.');
    }

    public function destroy(Answer $hasil)
    {
        $hasil->delete();

        return redirect()->route('hasil.index')->with('success', 'Hasil berhasil dihapus.');
    }

    public function export()
    {
        // Group answers by NIS and calculate statistics
        $groupedAnswers = Answer::with('question', 'siswa', 'category')
            ->selectRaw('nis, COUNT(*) as total_answers, COUNT(DISTINCT id_option_chosen) as unique_options')
            ->groupBy('nis')
            ->get()
            ->map(function ($group) {
                $nis = $group->nis;
                $answers = Answer::where('nis', $nis)->with('question', 'siswa', 'category')->get();

                // Get student name
                $namaSiswa = $answers->first()->siswa->nama_siswa ?? 'N/A';

                // Menghitung jawaban terbanyak
                $optionCounts = $answers->groupBy('id_option_chosen')->map->count();
                $mostFrequentCount = $optionCounts->max();
                $mostFrequentOption = $optionCounts->filter(fn ($count) => $count === $mostFrequentCount)->keys();

                $optionToLetter = [
                    1 => 'A',
                    2 => 'B',
                    3 => 'C',
                ];
                // Mengubah ID Jawaban ke Opsi (A, B, C)
                $mostFrequentOptionLetter = $mostFrequentOption->map(fn ($optionId) => $optionToLetter[$optionId] ?? '?')->implode(', ');;
                // if ($mostFrequentOption == 1) {
                //     $mostFrequentOptionLetter = 'A';
                // } elseif ($mostFrequentOption == 2) {
                //     $mostFrequentOptionLetter = 'B';
                // } elseif ($mostFrequentOption == 3) {
                //     $mostFrequentOptionLetter = 'C';
                // }
                if ($mostFrequentOption->count() === 1) {
                    $mostFrequentOptionLetter = $mostFrequentOptionLetter; // satu huruf saja
                } else {
                    $mostFrequentOptionLetter = $mostFrequentOptionLetter; // gabungan huruf (misal "B, C")
                }

                // Jawaban dengan pola tertentu untuk menentukan kategori
                $totalAnswers = $answers->count();
                $category = 'Belum dapat ditentukan';
                $recommendation = 'Belum dapat ditentukan';

                if ($totalAnswers > 0) {
                    $optionPercentages = $optionCounts->map(function ($count) use ($totalAnswers) {
                        return ($count / $totalAnswers) * 100;
                    });

                    // Ambil 2 opsi terbanyak
                    // $sortedOptions = $optionCounts->sortDesc()->keys()->take(2)->toArray();
                    $sortedOptions = $optionCounts
                        ->filter(fn ($count) => $count === $mostFrequentCount)
                        ->keys()
                        ->toArray();

                    // menentukan kategori berdasarkan kombinasi
                    if (count($sortedOptions) == 1) {
                        // Terbanyak dominan 1 jawaban
                        $dominantOption = $sortedOptions[0];
                        $category = $dominantOption == 1 ? 'A' : ($dominantOption == 2 ? 'B' : 'C');
                    } elseif (count($sortedOptions) == 2) {
                        // Kalau jumlah jawaban ada 2 opsi
                        sort($sortedOptions); // Sort to ensure consistent order
                        if ($sortedOptions == [1, 2]) {
                            $category = 'A dan B';
                        } elseif ($sortedOptions == [1, 3]) {
                            $category = 'A dan C';
                        } elseif ($sortedOptions == [2, 3]) {
                            $category = 'B dan C';
                        }
                    }

                    // Tampilkan rekomendasi dari tabel categories
                    $categoryModel = \App\Models\Category::where('name', $category)->first();
                    if ($categoryModel) {
                        $recommendation = $categoryModel->description;
                    }
                }

                return [
                    'nis' => $nis,
                    'nama_siswa' => $namaSiswa,
                    'jawaban_terbanyak' => $mostFrequentOptionLetter . ' (' . $mostFrequentCount . ')',
                    'kategori' => $category,
                    'rekomendasi' => $recommendation,
                ];
            });

        // Generate file excel
        $filename = 'hasil_kuisioner_' . date('Y-m-d_H-i-s');

        return Excel::download(new HasilExport($groupedAnswers), $filename . '.xlsx');
    }
}
