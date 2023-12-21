<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    protected $database;
    protected $tablename = 'users';

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index()
    {
        return view('register');
    }

    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $ref_tablename = 'users';
        $username = $request->input('username');

        // Check if the username already exists
        if (!$this->isUsernameUnique($username)) {
            return redirect('register')->with('error', 'Username already exists. Choose another username.');
        }

        $postData = [
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ];

        // Set the username as the key in the database
        $this->database
            ->getReference($this->tablename)
            ->getChild($username)
            ->set($postData);

        // Redirect to 'login' after successfully adding data
        return redirect('login')->with('status', 'Register succes. Please login!');
    }

    private function isUsernameUnique($username)
    {
        // Check if the username already exists in Firebase
        $userRef = $this->database->getReference($this->tablename)->getChild($username)->getValue();

        // If the username already exists, return false; otherwise, return true
        return !$userRef;
    }
}
