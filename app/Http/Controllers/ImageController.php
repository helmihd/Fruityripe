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
        try {
            $serviceAccountPath = base_path('frutyripe-firebase-adminsdk-ww9bg-272a6d9f89.json');

            $file = $request->file('fileInput');
            $username = $request->session()->get('username');
            $timestamp = now()->timestamp;

            $key = $username . '_' . $timestamp;

            $factory = (new Factory)->withServiceAccount($serviceAccountPath);
            $storage = $factory->createStorage();
            $bucket = $storage->getBucket();

            $object = $bucket->upload(
                file_get_contents($file->path()),
                [
                    'name' => 'pictures/' .  $username . '/' . $key . '.png',
                ]
            );
                        
            $databaseUrl = 'https://frutyripe-default-rtdb.firebaseio.com';
            $database = $factory->withDatabaseUri($databaseUrl)->createDatabase();

            $reference = $database->getReference('pictures/' . $key);

            $reference->set([
                'username' => $username,
                'timestamp' => $timestamp,
            ]);
            return redirect('/result')->with('status', 'Image uploaded successfully');
        } catch (\Exception $e) {
            return redirect('/dashboard')->with('status', 'Failed to upload image')->with('status_type', 'error');
        }
    }
}
