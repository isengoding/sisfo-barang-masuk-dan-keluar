<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Arr;
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
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }

        return redirect()->route('images.index');

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
        // avatars/1705496289-3853945913.jpg.jpg
        // 1705462394.image.jpeg
        // dd(Storage::exists('public/' . $image->path));
        try {
            if ($request->file) {

                if (Storage::exists('public/' . $image->path)) {
                    Storage::delete('public/' . $image->path);
                }
                $avatarName = time() . '-' . Filepond::field($request->file)->getFile()->getClientOriginalName();

                $fileInfo = Filepond::field($request->file)
                    ->moveTo('avatars/' . $avatarName);
                // dd($fileInfo);

                $image->update(['path' => $fileInfo['location']]);
                return back()->withSuccess('File uploaded successfully');
            } else {

                return back()->withErrors(['file' => 'Failed to upload file']);
            }
        } catch (\Exception $e) {
            // Handle any exceptions during file processing
            return back()->withErrors(['file' => 'Error processing the file: ' . $e->getMessage()]);
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

    public function upload(Request $request)
    {
        // $validatedData = $request->validate([
        //     'file' => Rule::filepond([
        //         'required',
        //     ])
        // ]);
        // dd($request->file('file'));
        // if ($request->hasFile('file')) {
        //     dd('taek ada filenya');
        //     $files = $request->file('file');
        //     $path = $files->storePublicly('files', 'public');

        //     // dd($files);
        //     // foreach ($files as $key => $file) {
        //     //     $filename = $file->getClientOriginalName();
        //     //     $folder = uniqid() . '-' . time();
        //     //     // $file->storeAs('orders/temp/' . $folder, $filename);
        //     //     // Image::query()->create(['folder' => $folder, 'filename' => $filename]);
        //     //     // Arr::add($folders, $key, $folder);
        //     // }
        //     return response()->json(['status' => 'ok'], 200);
        // }

        // $this->validate($request, [
        //     // 'file' => Rule::filepond([
        //     //     'required',
        //     //     'image',
        //     //     // 'max:2000'
        //     // ]),
        //     'file' => Rule::filepond([
        //         'required',
        //         'image',
        //         // 'max:2000'
        //     ]),

        // ]);
        try {
            if ($request->file) {

                $avatarName = time() . '-' . Filepond::field($request->file)->getFile()->getClientOriginalName();

                $fileInfo = Filepond::field($request->file)
                    ->moveTo('avatars/' . $avatarName);
                // dd($fileInfo);

                Image::create(['path' => $fileInfo['location']]);
                return back()->withSuccess('File uploaded successfully');
            } else {

                return back()->withErrors(['file' => 'Empty']);
            }
        } catch (\Exception $e) {
            // Handle any exceptions during file processing
            return back()->withErrors(['file' => 'Error processing the file: ' . $e->getMessage()]);
        }
        // dd(Filepond::field($request->file)->filename);
        // $files = $request->file;
        // // $avatarName = time() . '.' . 'image';
        // $avatarName = time() . '-' . Filepond::field($request->file)->getFile()->getClientOriginalName();
        // // dd($avatarName);
        // $fileInfo = Filepond::field($request->file)
        //     ->moveTo('avatars/' . $avatarName);
        // // dd($fileInfo);

        // Image::create(['path' => $fileInfo['location']]);

        // return redirect()->back();
    }
}
