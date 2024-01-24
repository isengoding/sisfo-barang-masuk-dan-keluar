<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use RahulHaque\Filepond\Facades\Filepond;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::all();

        return view('images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!empty($request->input('path'))) {
            try {
                $newFilename = Str::after($request->input('path'), 'tmp/');
                Storage::disk('public')->move($request->input('path'), "images/$newFilename");
                Image::create(['path' => "images/$newFilename"]);
                return redirect()->route('images.create')->withSuccess('File uploaded successfully');
            } catch (\Throwable $th) {
                return redirect()->back()->withError('An error occurred: ' . $th->getMessage());
            }
        }

        return redirect()->back()->withSuccess('No file Uploaded');


    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        return view('images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        $request->validate([
            // 'path' => 'max:1024|nullable',
            // 'image' => Rule::filepond([
            //     'max:5000',
            //     'image',
            //     'nullable'
            // ])
        ]);

        try {
            \DB::beginTransaction();
            if (!empty($request->input('path'))) {
                if (Str::afterLast($request->input('path'), '/') !== Str::afterLast($image->path, '/')) {
                    Storage::disk('public')->delete($image->path);
                    $newFilename = Str::after($request->input('path'), 'tmp/');
                    Storage::disk('public')->move($request->input('path'), "images/$newFilename");
                }

                $image->update([
                    'path' => isset($newFilename) ? "images/$newFilename" : $image->path
                ]);

                \DB::commit();
            }

            return redirect()->back()->withSuccess('File update successfully');

        } catch (\Throwable $th) {
            \DB::rollBack();
            return redirect()->back()->withError('An error occurred: ' . $th->getMessage());
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        if (Storage::exists('public/' . $image->path)) {
            Storage::delete('public/' . $image->path);
        }
        $image->delete();
        return back()->withSuccess('File deleted successfully');
    }

    public function revert(Request $request)
    {
        Storage::disk('public')->delete($request->getContent());
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'max:3000|nullable',
            // 'image' => Rule::filepond([
            //     'max:5000',
            //     'image',
            //     'nullable'
            // ])
        ]);

        if ($request->file('image')) {
            $file = $request->file('image');
            $originalName = $file->getClientOriginalName();
            $path = $file->storeAs('tmp', time() . '-' . $originalName, 'public');
        }
        return $path;

    }
}
