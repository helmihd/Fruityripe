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
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Retrieve user data from Firebase
        $usernameOrEmail = $request->input('username');
        $password = $request->input('password');

        // Verify user data in Firebase
        $userData = $this->authenticateUser($usernameOrEmail, $password);

        if ($userData && is_array($userData)) {
            // Retrieve username from user data
            $username = $userData['username'];

            // Store user information in session
            $request->session()->put('username', $username);

           return redirect()->route('dashboard');
        } else {
            return redirect('login')->with('error', 'Username or Password incorrect!');
        }
    }

    private function authenticateUser($usernameOrEmail, $password)
    {
        // Get reference to the users table in Firebase
        $userRef = $this->database->getReference('users');

        // Check if the input is a valid email address
        if (filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL)) {
            // If it's an email, find the user by email
            $userData = $this->findUserByEmail($userRef, $usernameOrEmail);
        } else {
            // If it's not an email, find the user by username
            $userData = $this->findUserByUsername($userRef, $usernameOrEmail);
        }

        // Debugging to see the data type and value
        if (is_array($userData) && isset($userData['password'])) {
            // User data found, check the password
            $storedPassword = $userData['password'];

            // Verify the password using Hash::check
            if (Hash::check($password, $storedPassword)) {
                return $userData;
            }
        }

        return null;
    }

    private function findUserByUsername($userRef, $username)
    {
        // Get user data based on the provided username
        $userData = $userRef->getChild($username)->getValue();

        // If user data is found, add the 'username' key to the array
        if ($userData) {
            $userData['username'] = $username;
        }

        return $userData;
    }

    private function findUserByEmail($userRef, $email)
    {
        foreach ($userRef->getSnapshot()->getValue() as $username => $userData) {
            // Check whether the email in the user data is the same as the input email
            if (isset($userData['email']) && $userData['email'] === $email) {
                $userData['username'] = $username;
                return $userData;
            }
        }
    
        return null;
    }

    public function logout()
    {
        // Delete the logged in user's session data
        Session::forget('username');

        return redirect('/dashboard');
    }
}
