<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePemasokRequest;
use App\Http\Requests\UpdatePemasokRequest;
use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter['search'] = request()->keyword;

        $pemasoks = Pemasok::query()
            ->filter($filter)
            ->latest()
            ->paginate(10);

        return view('pages.pemasok.index', compact('pemasoks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pemasok.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePemasokRequest $request)
    {
        Pemasok::create($request->validated());
        return redirect()->route('pemasok.index')->with('success', 'Pemasok created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemasok $pemasok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemasok $pemasok)
    {
        return view('pages.pemasok.edit', compact('pemasok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemasokRequest $request, Pemasok $pemasok)
    {
        $pemasok->update($request->validated());
        return redirect()->route('pemasok.index')->with('success', 'Pemasok updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemasok $pemasok)
    {
        $pemasok->delete();
        return redirect()->route('pemasok.index')->with('success', 'Pemasok deleted successfully');
    }
}
