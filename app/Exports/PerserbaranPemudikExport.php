<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class PerserbaranPemudikExport implements FromCollection, WithHeadings, WithEvents
, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $data, $rw, $rt;

    public function __construct($data, $rw, $rt)
    {
        $this->data = $data;
        $this->rw = $rw;
        $this->rt = $rt;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
          'Wilayah RW',
          'Wilayah RT',
          'Total Pemudik yang Pulang',
        ];
    }
    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function(BeforeSheet $event){
              $event->sheet->setCellValue('A1', 'REKAP PERSEBARAN PEMUDIK');
              $event->sheet->setCellValue('A2', 'KADIPATEN, KRATON, KOTA YOGYAKARTA');
              $event->sheet->setCellValue('A4', 'RT:');
              $event->sheet->setCellValue('B4', $this->rt);
              $event->sheet->setCellValue('A5', 'RW:');
              $event->sheet->setCellValue('B5', $this->rw);
              $event->sheet->setCellValue('A6', ' ');
              $event->sheet->mergeCells('A1:C1');
              $event->sheet->mergeCells('A2:C2');

              $event->sheet->getStyle('A1:A2')->applyFromArray([
                  'font' => [
                      'bold' => true,
                      'size' => 16
                  ],
                  'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ]
              ]);
            },
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A7:C7')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
                $fillData = 7 + $this->data->count();
                $event->sheet->getStyle('A7:C'.$fillData)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
    }
}
