<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
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
        $karyawancount = Karyawan::count();

        return view('home.index', [
            'title' => 'Home',
            'users' => $users,
            'karyawancount' => $karyawancount,
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
