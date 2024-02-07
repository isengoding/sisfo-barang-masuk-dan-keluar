<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\BarangImport;
use Maatwebsite\Excel\Facades\Excel;

class BarangImportController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.barang.import');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            $import = new BarangImport;
            Excel::import($import, $request->file);
            // dd($import->getRowCount());
            return redirect()
                ->route('barang.import.create')
                ->withSuccess("Total data imported: " . $import->getRowCount());

        } catch (\Throwable $e) {

            return redirect()
                ->route('barang.import.create')
                ->withError("Data Failed to import. ERROR MESSAGE: " . $e->getMessage());

        }
    }


}
