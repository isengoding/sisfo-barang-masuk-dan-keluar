<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BarangMasukLaporanExport implements FromView, WithEvents, ShouldAutoSize
{
    protected $data;

    public function __construct($data)
    {
        $this->setData($data);
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                //MERGE CELLS
                $event->sheet->mergeCells('A1:I1');
                $event->sheet->mergeCells('A2:I2');
                $event->sheet->mergeCells('A3:I3');
                $event->sheet->mergeCells('A4:I4');
                $event->sheet->mergeCells('A6:I6');
                $event->sheet->mergeCells('A7:I7');

                $header = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ];

                $event->sheet->getStyle('A1:F4')->applyFromArray($header);

            },
        ];
    }

    public function view(): View
    {
        return view('pages.barang-masuk.laporan.excel', [
            'barangMasukDetails' => $this->getData(),
        ]);
    }
}
