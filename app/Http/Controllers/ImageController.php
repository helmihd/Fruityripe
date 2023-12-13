<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function imageUpload(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = 'Images/' . $imageName;

            // Simpan gambar ke Google Cloud Storage
            Storage::disk('gcs')->put($path, fopen($image, 'r+'));

            // Anda juga dapat mengembalikan URL gambar jika diperlukan
            $imageUrl = Storage::url($path);

            // Kembalikan respons dengan status 200 dan pesan sukses
            return redirect('/dashboard')->with('status', 'Image uploaded successfully')->with('url', $imageUrl);
        } catch (\Exception $e) {
            // Kembalikan respons dengan status 500 dan pesan error
            return redirect('/dashboard')->with('status', 'Failed to upload image. Error: ' . $e->getMessage())->with('url', null);
        }
    }
}
