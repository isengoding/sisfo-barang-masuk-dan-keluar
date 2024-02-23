<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use App\Models\BarangMasukDetail;
use App\Models\BarangKeluarDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalProduk = Barang::count();
        $totalUser = User::count();
        $totalBarangMasuk = BarangMasuk::count();
        $totalBarangKeluar = BarangKeluar::count();

        $riwayatBarangMasuk = BarangMasukDetail::query()
            ->with('barangMasuk', 'barang')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $riwayatBarangKeluar = BarangKeluarDetail::query()
            ->with('barangKeluar', 'barang')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $stokWarningInfo = DB::select("SELECT * FROM barangs WHERE stok < min_stok;");



        return view(
            'dashboard',
            compact(
                'totalProduk',
                'totalUser',
                'totalBarangKeluar',
                'totalBarangMasuk',
                'riwayatBarangMasuk',
                'riwayatBarangKeluar',
                'stokWarningInfo',
            )
        );
    }


}
