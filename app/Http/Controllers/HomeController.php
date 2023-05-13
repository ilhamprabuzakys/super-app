<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Karyawan;
use App\Models\Log;
use App\Models\Loker;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $competencies = ['Web Programming', 'Desktop Programing', 'Machine Learning', 'Internet of Things', 'Embedded System', 'Design UI/UX', 'Design 2D & 3D', 'Mobile Programming'];
        $lokers = Loker::orderBy('updated_at', 'desc')->get();
        $company = Company::first();

        return view('home.index', [
            'title' => 'Makerindo',
        ], compact('lokers', 'company'));
    }

    public function show_loker(Loker $loker)
    {
        dd($loker);
    }

    public function dashboard()
    {
        $users = User::all();
        $karyawancount = Karyawan::count();
        $usercount = Karyawan::count();

        return view('dashboard.index', [
            'title' => 'Dashboard',
        ], compact('users', 'karyawancount', 'usercount'));
    }
    
   
    public function logs_list()
    {
        $logs = Log::with('user')->where('id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
        return view('logs.list', [
            'title' => 'Log List',
        ], compact('logs'));
    }
}
