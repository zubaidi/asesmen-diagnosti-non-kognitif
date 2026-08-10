<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TracerStudyExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    protected $tracerStudies;

    public function __construct($tracerStudies)
    {
        $this->tracerStudies = $tracerStudies;
    }

    public function collection()
    {
        return collect($this->tracerStudies)->map(function ($ts, $index) {
            return [
                $index + 1,
                $ts->nama_siswa,
                $ts->siswa->kelas ?? 'N/A',
                $ts->option,
                $ts->answer,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Siswa',
            'Kelas',
            'Pilihan',
            'Akan Melanjutkan?',
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
