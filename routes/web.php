<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BengkelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MontirController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Route;

// home
Route::get('/', function () {
    return view('home');
})->name('home');

// login
Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.action');

// register
Route::get('register', [AuthController::class, 'registerFrom'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.action');

Route::middleware('auth', 'can:admin')->group(function () {
    // logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // bengkel
    Route::get('profil-bengkel', [BengkelController::class, 'index'])->name('profil-bengkel');
    Route::put('profil-bengkel', [BengkelController::class, 'update'])->name('update-bengkel');

    // montir
    Route::resource('montir', MontirController::class);

    // barang
    Route::resource('barang', BarangController::class);
    Route::get('aprove-barang', [RiwayatController::class, 'viewApprove'])->name('view.aprove.barang');
    Route::get('aprove-barang/{id}', [RiwayatController::class, 'editApprove'])->name('edit.aprove.barang');
    Route::put('aprove-barang/{id}', [RiwayatController::class, 'approve'])->name('aprove.barang');

    // riwayat
    Route::get('riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
});
