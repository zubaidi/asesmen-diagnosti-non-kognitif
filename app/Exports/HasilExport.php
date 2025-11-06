<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class HasilExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    protected $groupedAnswers;

    public function __construct($groupedAnswers)
    {
        $this->groupedAnswers = $groupedAnswers;
    }

    public function collection()
    {
        return collect($this->groupedAnswers)->map(function ($group, $index) {
            return [
                $index + 1,
                $group['nis'],
                $group['nama_siswa'],
                $group['jawaban_terbanyak'],
                $group['kategori'],
                $group['rekomendasi']
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'NIS',
            'Nama Siswa',
            'Jawaban Terbanyak',
            'Kategori',
            'Rekomendasi'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF']
                ],
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => ['rgb' => '007BFF']
                ]
            ]
        ];
    }
}
