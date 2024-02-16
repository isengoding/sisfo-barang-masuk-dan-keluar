<?php

namespace App\Http\Controllers;

use App\Exports\BarangStokLaporanExport;
use App\Models\Barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class BarangStokLaporanController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $barangs = $this->filter();

        // dd($barangs->first()->totalBarangMasuk);

        return view('pages.barang.laporan.stok', compact('barangs'));
    }

    public function pdf()
    {
        $barangs = $this->filter();

        $pdf = Pdf::setOptions([
            'dpi' => 110,
            // 'defaultFont' => 'sans-serif',
        ])
            ->loadView('pages.barang.laporan.pdf', [
                'barangs' => $barangs,
            ]);

        return $pdf->stream('laporan-stok-barang.pdf');
    }

    public function excel()
    {

        $barangs = $this->filter();

        return Excel::download(new BarangStokLaporanExport($barangs), 'laporan-stok-barang.xls');
    }

    public function filter()
    {
        $filter['search'] = request()->keyword;
        // $filter['date_from'] = request()->from_date;
        // $filter['date_to'] = request()->to_date;

        return Barang::query()
            ->with('barangMasukDetails')
            ->filter($filter)
            // ->orderBy('id', 'desc')
            ->latest()
            ->get();
    }
}
