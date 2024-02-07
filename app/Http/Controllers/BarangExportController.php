<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Exports\BarangExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class BarangExportController extends Controller
{
    public function pdf()
    {

        $pdf = Pdf::setOptions([
            'dpi' => 110,
            // 'defaultFont' => 'sans-serif',
        ])
            ->loadView('pages.barang.pdf', [
                'barangs' => Barang::all(),
            ]);

        return $pdf->stream('laporan-data-barang.pdf');
    }

    public function excel()
    {

        $data = Barang::query()
            ->with('satuan', 'kategoris')
            ->get();

        return Excel::download(new BarangExport($data), 'data-barang.xls');
    }
}
