<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKategoriRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter['search'] = request()->keyword;

        $kategoris = Kategori::query()
            ->filter($filter)
            ->latest()
            ->paginate(10);

        return view('pages.kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKategoriRequest $request)
    {
        Kategori::create($request->validated());
        return redirect()->route('kategori.index')->with('success', 'Kategori created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('pages.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreKategoriRequest $request, Kategori $kategori)
    {

        $kategori->update($request->validated());
        return redirect()->route('kategori.index')->with('success', 'Kategori updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {

        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori deleted successfully');
    }
}
