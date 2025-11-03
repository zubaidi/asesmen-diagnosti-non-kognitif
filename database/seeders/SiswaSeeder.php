<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswa = [
            ['nis' => '236907', 'nama_siswa' => 'ABDULLAH RIYADH', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236908', 'nama_siswa' => 'ADITIA PRATAMA', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236909', 'nama_siswa' => 'AHMAD SYARIEF BAGUS SAJIWO', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236910', 'nama_siswa' => 'ALINDA ARDIANINGSIH', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236911', 'nama_siswa' => 'ALTSA AULIANA SARIN', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236912', 'nama_siswa' => 'ARIFIA RIZQI PUSPANINGTYAS', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236913', 'nama_siswa' => 'AVA ULVATIN ROICHANA', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236915', 'nama_siswa' => 'DIMAS ARAZI MAULANA', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236917', 'nama_siswa' => 'FIRDA ELA LESTARI', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236918', 'nama_siswa' => 'IKFI NAFA ULIYA', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236919', 'nama_siswa' => 'JIHAN ARFALIZA MADINA', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236920', 'nama_siswa' => 'KAYLA SALSABILLA', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236921', 'nama_siswa' => 'LANANG AZ ZUKHRUF', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236922', 'nama_siswa' => 'M FAJAR RAMADHANI', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236923', 'nama_siswa' => 'M. AINUN AROFIK', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236924', 'nama_siswa' => "M. HADANA BINAF'A AKBAR", 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236925', 'nama_siswa' => 'M. MICHAEL ATTHORTHUSY', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236926', 'nama_siswa' => "M. RIFQI MAS'UDI", 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236927', 'nama_siswa' => 'M. RIZQI ROBBI SYAFAAT', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236928', 'nama_siswa' => 'MAHARANI ZAMRONIE PUTRI', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236929', 'nama_siswa' => 'MAULANA MALIK ABDUL SALAM', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236930', 'nama_siswa' => 'MOKHAMAD DANI ARIFFUDIN', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236931', 'nama_siswa' => 'MUHAMAD YUDA ZAIN NUGRAHA', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236932', 'nama_siswa' => 'MUHAMMAD FAHRI DUSKI', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236933', 'nama_siswa' => 'M. HASAN IRSYAD', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236934', 'nama_siswa' => 'MUHAMMAD ISTIAN MAULA', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236935', 'nama_siswa' => 'MUHAMMAD NAUFAL NAQIF', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236936', 'nama_siswa' => 'MUHAMMAD RAFI ASSIDIQI', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236937', 'nama_siswa' => 'NADIA NABILATUS SHALIKHA', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236939', 'nama_siswa' => 'NIHAYATUZ ZEN', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236941', 'nama_siswa' => 'RIZKI RAMADHANI', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236942', 'nama_siswa' => 'SANDY AHMAD SATRIATAMA', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236943', 'nama_siswa' => 'SAYLA MINHATIL MAULA', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '236944', 'nama_siswa' => 'SYAROF AZKA ALJAESY', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '247188', 'nama_siswa' => 'DWI PUTRA ROMADONI', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '247189', 'nama_siswa' => 'MUH. KHALIFAH ABDILLAH INSANI', 'kelas' => 'XIIRPL1', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('siswa')->insert($siswa);
    }
}
