# TODO: Perbaiki Sidebar di Admin Dashboard

## Langkah-langkah yang Telah Dilakukan

1. **Edit app-layout.blade.php untuk mengganti dropdown "Pertanyaan" dengan collapsible menu menggunakan Bootstrap collapse.**
   - Ganti struktur dropdown dengan collapsible section untuk integrasi yang lebih baik di sidebar. ✅

2. **Pindahkan footer sidebar ke luar list-group.**
   - Pindahkan footer dari dalam list-group ke posisi yang tepat di luar, untuk memastikan footer selalu di bagian bawah. ✅

3. **Sesuaikan CSS untuk penempatan footer yang tepat.**
   - Pastikan footer terletak di bawah sidebar dengan posisi yang benar, menggunakan flexbox. ✅

4. **Pastikan active states berfungsi untuk menu collapsible.**
   - Periksa dan sesuaikan logika active state untuk menu "Pertanyaan" dan sub-menu. ✅

5. **Tambahkan JavaScript untuk menangani collapse menu.**
   - Tambahkan event listener untuk toggle collapse pada menu "Pertanyaan". ✅

## File yang Diedit
- `resources/views/admin/components/app-layout.blade.php`

## Langkah Selanjutnya
- Uji aplikasi untuk memastikan sidebar berfungsi dengan baik. Jalankan server dan periksa toggle sidebar serta collapse menu.
- Perbaiki collapsible menu agar bisa ditutup dengan benar menggunakan data-bs-target dan animasi chevron.
