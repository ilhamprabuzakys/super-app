<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index()
    {
        $data = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')->json();
        dd($data);
    }
}
