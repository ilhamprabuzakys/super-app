<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/{loker}', [HomeController::class, 'show_loker'])->name('loker.detail');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('home');
    Route::get('/logs-list', [HomeController::class, 'logs_list'])->name('log.index');
    Route::resource('/karyawan', KaryawanController::class);
});

Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/users/grid', [UserController::class, 'grid'])->name('users.grid');
    Route::resource('/users', UserController::class);
});
