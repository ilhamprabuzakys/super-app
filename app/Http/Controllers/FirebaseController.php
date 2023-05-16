<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FirebaseController extends Controller
{
    public function index()
    {
        return view('firebase.index', [
            'title' => 'Firebase OTP'
        ]);
    }
}
