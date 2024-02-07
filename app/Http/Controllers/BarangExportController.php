<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
}
