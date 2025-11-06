<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'A',
                'description' => '• Anda dengan kecenderungan gaya belajar visual.
• Anda akan mencapai prestasi belajar yang optimal apabila memanfaatkan kemampuan visual Anda.
• Anda dapat membuat sendiri peta konsep atau ringkasan materi perkuliahan.',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'name' => 'B',
                'description' => '• Anda memiliki kecenderungan gaya belajar auditori.
• Anda yang memiliki kecenderungan gaya belajar auditori akan mencapai prestasi belajar yang optimal apabila Anda mempelajari materi perkuliahan dari mendengarkan baik melalui penjelasan langsung dari dosen, diskusi dengan dosen dan teman mahasiswa, maupun melalui rekaman materi yang sedang dipelajari.',
"created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'name' => 'C',
                'description' => '• Anda memiliki kecenderungan gaya belajar kinestetik.
• Anda dengan gaya belajar kinestetik akan mencapai prestasi belajar secara optimal apabila Anda terlibat langsung secara fisik dalam kegiatan belajar.
• Anda dapat mengutak-atik atau memanipulasi materi perkuliahan atau media yang digunakan dalam menjelaskan materi perkuliahan.',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'name' => 'A dan B',
                'description' => '• Anda memiliki gabungan gaya belajar visual dan auditori.
• Ada hal tertentu yang Anda akan belajar efektif jika menggunakan gaya belajar visual, dan ada hal lain yang Anda akan belajar efektif jika menggunakan gaya belajar auditori.
• Bahkan, kadang jika kedua gaya belajar digunakan, akan lebih optimal.',
"created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'name' => 'A dan C',
                'description' => '• Anda memiliki gabungan gaya belajar visual dan kinestetik.
• Ada hal tertentu yang Anda akan belajar efektif jika menggunakan gaya belajar visual, dan ada hal lain yang Anda akan belajar efektif jika menggunakan gaya belajar kinestetik.
• Bahkan, kadang jika kedua gaya belajar digunakan, akan lebih optimal.',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'name' => 'B dan C',
                'description' => '• Anda memiliki gabungan gaya belajar auditori dan kinestetik.
• Ada hal tertentu yang Anda akan belajar efektif jika menggunakan gaya belajar auditori, dan ada hal lain yang Anda akan belajar efektif jika menggunakan gaya belajar kinestetik.
• Bahkan, kadang jika kedua gaya belajar digunakan, akan lebih optimal.',
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
