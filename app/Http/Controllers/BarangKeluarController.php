<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter['search'] = request()->keyword;

        $barangKeluars = BarangKeluar::query()
            ->filter($filter)
            ->latest()
            ->paginate(10);

        return view('pages.barang-keluar.index', compact('barangKeluars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.barang-keluar.create');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
