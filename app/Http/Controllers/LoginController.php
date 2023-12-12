<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Illuminate\Support\Facades\Session;
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
        $usernameOrEmail = $request->input('username');
        $password = $request->input('password');

        // Lakukan verifikasi data pengguna di Firebase
        $userData = $this->authenticateUser($usernameOrEmail, $password);

        if ($userData && is_array($userData)) {
            // Ambil username dari data pengguna
            $username = $userData['username'];

            // Simpan informasi pengguna di sesi
            $request->session()->put('username', $username);

            // Pengguna berhasil login
            return redirect('/dashboard');
        } else {
            // Gagal login
            return redirect('login')->with('status', 'Login gagal. Periksa kembali username dan password.');
        }
    }

    private function authenticateUser($usernameOrEmail, $password)
    {
        // Dapatkan referensi ke tabel pengguna di Firebase
        $userRef = $this->database->getReference('users');

        // Ambil data pengguna berdasarkan username
        // Periksa apakah input username adalah alamat email
        if (filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL)) {
            // Jika ya, cari pengguna berdasarkan email
            $userData = $this->findUserByEmail($userRef, $usernameOrEmail);
        } else {
            // Jika tidak, cari pengguna berdasarkan username
            $userData = $userRef->getChild($usernameOrEmail)->getValue();
        }
        //$userData = $userRef->getChild($username)->getValue();

        // Debugging untuk melihat tipe data dan nilainya
        if (is_array($userData) && isset($userData['password'])) {
            // Data pengguna ditemukan, cek password
            $storedPassword = $userData['password'];

            // Verifikasi password dengan menggunakan Hash::check
            if (Hash::check($password, $storedPassword)) {
                return $userData;
            }
        }

        return null;
    }

    private function findUserByEmail($userRef, $email)
    {
        // Iterasi melalui setiap child pada tabel pengguna
        foreach ($userRef->getSnapshot()->getValue() as $username => $userData) {
            // Periksa apakah email pada data pengguna sama dengan input email
            if (isset($userData['email']) && $userData['email'] === $email) {
                $userData['username'] = $username;
                return $userData;
            }
        }
    
        return null;
    }

    public function logout()
    {
        // Hapus data sesi pengguna yang sedang login
        Session::forget('username');

        // Redirect ke halaman login atau halaman lain yang sesuai
        return redirect('/login');
    }
}
