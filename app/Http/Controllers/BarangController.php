<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBarangRequest;
use App\Models\Barang;
use App\Models\Satuan;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBarangRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter['search'] = request()->keyword;

        $barangs = Barang::query()
            ->filter($filter)
            ->latest()
            ->paginate(10);

        return view('pages.barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $satuans = Satuan::all();
        $kategoris = Kategori::all();

        return view('pages.barang.create', compact('satuans', 'kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBarangRequest $request)
    {
        $data = $request->except('gambar');

        $data['kategori'] = $request->kategori_id;

        try {
            \DB::beginTransaction();

            if (!empty($request->input('gambar'))) {
                $newFilename = Str::after($request->input('gambar'), 'tmp/');
                Storage::disk('public')->move($request->input('gambar'), "gambar/$newFilename");
                $data['gambar'] = "gambar/$newFilename";
            }

            $barang = Barang::create($data);
            $barang->kategoris()->sync($data['kategori_id']);
            \DB::commit();

            return redirect(route('barang.index'))->withSuccess('Barang created successfully');
        } catch (\Exception $e) {
            \DB::rollBack();
            // if (Storage::exists('public/' . $data['image'])) {
            //     Storage::delete('public/' . $data['image']);
            // }


            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        $satuans = Satuan::all();
        $kategoris = Kategori::all();

        return view('pages.barang.edit', compact('barang', 'satuans', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        $data = $request->except('gambar');

        $data['kategori'] = $request->kategori_id;

        try {
            \DB::beginTransaction();
            if (!empty($request->input('gambar'))) {

                if (Str::afterLast($request->input('gambar'), '/') !== Str::afterLast($barang->gambar, '/')) {
                    $newFilename = Str::after($request->input('gambar'), 'tmp/');
                    if (Storage::exists('public/' . $barang->gambar) && $barang->gambar !== "gambar/default.png") {
                        Storage::delete('public/' . $barang->gambar);
                    }
                    Storage::disk('public')->move($request->input('gambar'), "gambar/$newFilename");
                    $data['gambar'] = "gambar/$newFilename";
                }

            }

            $barang->update($data);
            $barang->kategoris()->sync($data['kategori_id']);
            \DB::commit();
            return redirect(route('barang.index'))->withSuccess('Barang updated successfully');
        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e->getMessage());
            // if (Storage::exists('public/' . $data['image'])) {
            //     Storage::delete('public/' . $data['image']);
            // }
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        if (Storage::exists('public/' . $barang->gambar) && $barang->gambar !== "gambar/default.png") {
            Storage::delete('public/' . $barang->gambar);
        }
        $barang->delete();
        return redirect(route('barang.index'))->withSuccess('Data deleted successfully');
    }
}
