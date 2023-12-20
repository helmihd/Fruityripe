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
}
