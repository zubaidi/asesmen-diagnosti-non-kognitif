<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TestQuestionnaireSeeder extends Seeder
{
    public function run(): void
    {
        $classes = [
            'XRPL1', 'XRPL2',
            'XTKR1', 'XTKR2', 'XTKR3',
            'XTSM1', 'XTSM2', 'XTSM3', 'XTSM4',
            'XTKJ1', 'XTKJ2', 'XTKJ4',
            'XDPB1', 'XDPB2',
        ];

        $totalStudents = 200;
        $totalQuestions = 44;
        $questionIds = range(1, $totalQuestions); // ADNK01-ADNK44
        $idSoalList = array_map(fn($n) => 'ADNK' . str_pad($n, 2, '0', STR_PAD_LEFT), $questionIds);

        $optionWeights = [1, 2, 3]; // id_option: A, B, C

        // Distribute students evenly across classes
        $studentsPerClass = intdiv($totalStudents, count($classes));
        $remainder = $totalStudents % count($classes);

        $nisBase = 2000001; // Starting NIS
        $studentData = [];
        $answerData = [];
        $tracerData = [];

        $studentIndex = 0;

        foreach ($classes as $classIdx => $kelas) {
            $count = $studentsPerClass + ($classIdx < $remainder ? 1 : 0);

            for ($i = 0; $i < $count; $i++) {
                $nis = (string) ($nisBase + $studentIndex);
                $nama = 'Siswa ' . str_pad($studentIndex + 1, 3, '0', STR_PAD_LEFT);

                $studentData[] = [
                    'nis' => $nis,
                    'nama_siswa' => $nama,
                    'kelas' => $kelas,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                // Generate 44 answers per student with varied responses
                foreach ($idSoalList as $soalIdx => $idSoal) {
                    // Weighted random: 40% A, 35% B, 25% C to simulate realistic distribution
                    $rand = mt_rand(1, 100);
                    if ($rand <= 40) {
                        $chosen = 1;
                    } elseif ($rand <= 75) {
                        $chosen = 2;
                    } else {
                        $chosen = 3;
                    }

                    $answerData[] = [
                        'answer_code' => Str::random(10),
                        'nis' => $nis,
                        'nama_siswa' => $nama,
                        'id_soal' => $idSoal,
                        'id_option_chosen' => $chosen,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                // Tracer study: 50% BEKERJA, 30% KULIAH, 20% WIRAUSAHA
                $tracerRand = mt_rand(1, 100);
                if ($tracerRand <= 50) {
                    $option = 'BEKERJA';
                    $answers = [
                        'PT Maju Jaya',
                        'CV Berkah Abadi',
                        'PT Telkom Indonesia',
                        'PT Pertamina',
                        'CV Sinar Jaya',
                        'PT Garuda Indonesia',
                        'PT Astra International',
                        'UD Sejahtera',
                        'CV Harapan Jaya',
                        'PT Bank Mandiri',
                    ];
                } elseif ($tracerRand <= 80) {
                    $option = 'KULIAH';
                    $answers = [
                        'Universitas Indonesia',
                        'Institut Teknologi Bandung',
                        'Universitas Gadjah Mada',
                        'Universitas Negeri Jakarta',
                        'Universitas Padjadjaran',
                        'Institut Teknologi Sepuluh Nopember',
                        'Universitas Diponegoro',
                        'Universitas Brawijaya',
                        'Universitas Negeri Yogyakarta',
                        'Universitas Pancasila',
                    ];
                } else {
                    $option = 'WIRAUSAHA';
                    $answers = [
                        'Bisnis Online Shop',
                        'Bengkel Motor',
                        'Kedai Kopi',
                        'Laundry Kiloan',
                        'Cetak Sablon',
                        'Jualan Makanan Online',
                        'Fotografi Freelance',
                        'Ternak Lele',
                        'Barbershop',
                        'Percetakan Digital',
                    ];
                }

                $tracerData[] = [
                    'nis' => $nis,
                    'nama_siswa' => $nama,
                    'option' => $option,
                    'answer' => $answers[array_rand($answers)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $studentIndex++;
            }
        }

        // Bulk insert
        DB::table('siswa')->insert($studentData);
        DB::table('answers')->insert($answerData);
        DB::table('tracer_studies')->insert($tracerData);

        $this->command->info("Berhasil membuat {$totalStudents} siswa dengan 44 jawaban masing-masing dan data tracer study.");
    }
}
