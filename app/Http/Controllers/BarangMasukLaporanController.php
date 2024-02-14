<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\BarangMasukDetail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarangMasukLaporanExport;

class BarangMasukLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $barangMasukDetails = $this->filter();
        // ->paginate();

        return view('pages.barang-masuk.laporan.index', compact('barangMasukDetails'));
    }

    public function pdf()
    {
        $barangMasukDetails = $this->filter();

        $pdf = Pdf::setOptions([
            'dpi' => 110,
            // 'defaultFont' => 'sans-serif',
        ])
            ->loadView('pages.barang-masuk.laporan.pdf', [
                'barangMasukDetails' => $barangMasukDetails,
            ]);

        return $pdf->stream('laporan-barang-masuk.pdf');
    }

    public function excel()
    {

        $barangMasukDetails = $this->filter();

        return Excel::download(new BarangMasukLaporanExport($barangMasukDetails), 'laporan-barang-masuk.xls');
    }

    public function filter()
    {
        $filter['search'] = request()->keyword;
        $filter['date_from'] = request()->from_date;
        $filter['date_to'] = request()->to_date;

        return BarangMasukDetail::query()
            ->with('barang', 'barangMasuk')
            ->filter($filter)
            // ->orderBy('tgl_masuk', 'asc')
            ->get();
    }


}
