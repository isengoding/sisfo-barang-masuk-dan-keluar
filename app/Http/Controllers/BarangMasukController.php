<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter['search'] = request()->keyword;

        $barangMasuks = BarangMasuk::query()
            ->filter($filter)
            ->latest()
            ->paginate(10);

        return view('pages.barang-masuk.index', compact('barangMasuks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.barang-masuk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangMasuk $barangMasuk)
    {
        return view('pages.barang-masuk.show', compact('barangMasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangMasuk $barangMasuk)
    {
        return view('pages.barang-masuk.edit', compact('barangMasuk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangMasuk $barangMasuk)
    {
        foreach ($barangMasuk->barangMasukDetails as $value) {
            $value->barang->decrement('stok', $value->qty);
        }

        $barangMasuk->delete();

        return redirect()->route('barang-masuk.index')->with('success', 'Transaction Deleted Successfully.');
    }
}
