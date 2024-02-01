<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSatuanRequest;
use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter['search'] = request()->keyword;

        $satuans = Satuan::query()
            ->filter($filter)
            ->latest()
            ->paginate(10);

        return view('pages.satuans.index', compact('satuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.satuans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSatuanRequest $request)
    {

        Satuan::create($request->validated());
        return redirect()->route('satuans.index')->with('success', 'Satuan created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Satuan $satuan)
    {
        return view('pages.satuans.edit', compact('satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSatuanRequest $request, Satuan $satuan)
    {

        $satuan->update($request->validated());
        return redirect()->route('satuans.index')->with('success', 'Satuan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satuan $satuan)
    {

        $satuan->delete();
        return redirect()->route('satuans.index')->with('success', 'Satuan deleted successfully');
    }
}
