<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;

class ProfileController extends Controller
{
    public function index()
    {
        $username = session('username');
        $user = Firebase::database()->getReference('users/' . $username)->getValue();

        return view('/profile', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);
        
        $username = session('username');
        $userRef = Firebase::database()->getReference('users/' . $username);

        $userRef->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
        ]);

        return redirect()->route('profile');
    }
}
