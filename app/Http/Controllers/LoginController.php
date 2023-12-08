<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    protected $database;
    protected $tablename = 'users';

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ambil data pengguna dari Firebase
        $username = $request->input('username');
        $password = $request->input('password');

        // Lakukan verifikasi data pengguna di Firebase
        $isAuthenticated = $this->authenticateUser($username, $password);

        if ($isAuthenticated) {
            // Pengguna berhasil login
            return redirect('/dashboard');
        } else {
            // Gagal login
            return redirect('/login')->with('status', 'Login gagal. Periksa kembali username dan password.');
        }
    }

    private function authenticateUser($username, $password)
    {
        // Dapatkan referensi ke tabel pengguna di Firebase
        $userRef = $this->database->getReference('users');

        // Ambil data pengguna berdasarkan username
        $userData = $userRef->getChild($username)->getValue();

        // Debugging untuk melihat tipe data dan nilainya
        if (is_array($userData) && isset($userData['password'])) {
            // Data pengguna ditemukan, cek password
            $storedPassword = $userData['password'];

            // Verifikasi password dengan menggunakan Hash::check
            if (Hash::check($password, $storedPassword)) {
                return true;
            }
        }

        return false;
    }
}
