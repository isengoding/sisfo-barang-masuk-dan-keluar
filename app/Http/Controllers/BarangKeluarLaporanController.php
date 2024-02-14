<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\BarangKeluarDetail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarangKeluarLaporanExport;

class BarangKeluarLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $barangKeluarDetails = $this->filter();

        return view('pages.barang-keluar.laporan.index', compact('barangKeluarDetails'));
    }

    public function pdf()
    {
        $barangKeluarDetails = $this->filter();

        $pdf = Pdf::setOptions([
            'dpi' => 110,
            // 'defaultFont' => 'sans-serif',
        ])
            ->loadView('pages.barang-keluar.laporan.pdf', [
                'barangKeluarDetails' => $barangKeluarDetails,
            ]);

        return $pdf->stream('laporan-barang-keluar.pdf');
    }

    public function excel()
    {

        $barangKeluarDetails = $this->filter();

        return Excel::download(new BarangKeluarLaporanExport($barangKeluarDetails), 'laporan-barang-keluar.xls');
    }

    public function filter()
    {
        $filter['search'] = request()->keyword;
        $filter['date_from'] = request()->from_date;
        $filter['date_to'] = request()->to_date;

        return BarangKeluarDetail::query()
            ->with('barang', 'barangKeluar')
            ->filter($filter)
            // ->orderBy('id', 'desc')
            ->latest()
            ->get();
    }
}
