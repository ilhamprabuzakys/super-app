<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Log;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        $usercount = User::count();
        $kotacount = Kota::count();
        $kecamatancount = Kecamatan::count();
        $siswacount = Siswa::count();

        return view('home.index', [
            'title' => 'Home',
            'users' => $users,
            'usercount' => $usercount,
            'kotacount' => $kotacount,
            'kecamatancount' => $kecamatancount,
            'siswacount' => $siswacount,
        ]);
    }

    public function logs_list()
    {
        $logs = Log::with('user')->where('id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
        return view('logs.list', [
            'title' => 'Log List',
        ], compact('logs'));
    }
}
