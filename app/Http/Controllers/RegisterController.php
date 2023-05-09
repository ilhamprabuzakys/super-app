<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'Register',
        ]);
    }

    public function authenticate(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email:dns|unique:users',
                'password' => 'required|min:5|max:255|confirmed'
                // 'username' => ['required', 'min:4', 'max:255', 'unique:users'],
            ]);

            $validatedData['password'] = bcrypt($validatedData['password']);
            $username = explode('@', $validatedData['email'])[0];

            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'username' => $username,
            ]);

            return redirect()->route('login')->with('success', 'Your account has been <b>successfully</b> created! Please login');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }
}
