<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthOtpController extends Controller
{
    // Return View of Login Page
    public function login()
    {
        return view('auth.otp-login', [
            'title' => 'OTP Login'
        ]);
    }
}
