<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        $serviceAccountPath = base_path('frutyripe-firebase-adminsdk-ww9bg-272a6d9f89.json');

        // Mendapatkan data dari formulir
        $file = $request->file('fileInput');
        $username = $request->session()->get('username');
        $timestamp = now()->timestamp;

        // Generate key: username_timestamp
        $key = $username . '_' . $timestamp;

        // Upload gambar ke Firebase Storage
        $factory = (new Factory)->withServiceAccount($serviceAccountPath);
        $storage = $factory->createStorage();
        $bucket = $storage->getBucket();
        
        $object = $bucket->upload(
            file_get_contents($file->path()),
            [
                'name' => 'pictures/' .  $username . '/' . $key,
            ]
        );

        // Simpan data ke tabel pictures di Firebase Database
        $databaseUrl = 'https://frutyripe-default-rtdb.firebaseio.com';
        $database = $factory->withDatabaseUri($databaseUrl)->createDatabase();

        $reference = $database->getReference('pictures/' . $key);

        $reference->set([
            'username' => $username,
            'timestamp' => $timestamp,
        ]);

        return redirect('/dashboard')->with('status', 'Image uploaded successfully');
    }
}
