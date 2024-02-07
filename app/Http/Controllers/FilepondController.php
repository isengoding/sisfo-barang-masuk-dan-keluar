<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilepondController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'max:3000|nullable',
        ]);


        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $originalName = $file->getClientOriginalName();
            $path = $file->storeAs('tmp', time() . '-' . $originalName, 'public');
        }

        return $path;

    }


    public function destroy(Request $request)
    {
        Storage::disk('public')->delete($request->getContent());
    }
}
