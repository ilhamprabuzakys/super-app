<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthOtpController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('home');
    Route::get('/logs-list', [HomeController::class, 'logs_list'])->name('log.index');
    Route::resource('/karyawan', KaryawanController::class);
    Route::get('/api-test', [ApiController::class, 'index'])->name('api.index');
});

Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/users/grid', [UserController::class, 'grid'])->name('users.grid');
    Route::resource('/users', UserController::class);
});

require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/loker/{loker}', [HomeController::class, 'show_loker'])->name('loker.detail');
// Route::get('/message', [MessageController::class, 'index'])->name('message.index'); 
Route::resource('/message', MessageController::class);
Route::get('/map', [MapController::class, 'index'])->name('map.index');
Route::get('/coordinates/json', [MapController::class, 'json'])->name('map.json');
Route::get('/map2', [MapController::class, 'index2'])->name('map.index2');
Route::get('/otp-phone', [FirebaseController::class, 'index'])->name('firebase.index');

Route::controller(AuthOtpController::class)->group(function()
{
    Route::get('/otp/login', 'login')->name('otp.login');
});