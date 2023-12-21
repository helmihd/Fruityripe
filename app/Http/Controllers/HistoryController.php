<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Contract\Database;

class HistoryController extends Controller
{
    protected $database;
    protected $tablename = 'pictures';

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index()
    {
        // Tentukan path ke file service account JSON dari Firebase
        $serviceAccountPath = base_path('frutyripe-firebase-adminsdk-ww9bg-272a6d9f89.json');

        $username = session('username');

        // Inisialisasi Firebase dengan service account
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccountPath);

        $picturesRef = $this->database->getReference('pictures');

        $userRef = $picturesRef->getChild($username)->getValue();
        dd($userRef);

        $userSnapshot = $userRef->getSnapshot();

        $userData = $userSnapshot->getValue();

        // Inisialisasi array untuk menyimpan data gambar
        $pictures = [];

        if ($userData !== null) {
            // Add the user's data to the $pictures array
            $pictures[] = $userData;
        }

        // Kirim data ke view
        return view('history', ['pictures' => $pictures]);
    }
}
