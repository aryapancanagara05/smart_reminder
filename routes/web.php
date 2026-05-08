<?php

use App\Http\Controllers\JadwalController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/dashboard', [JadwalController::class, 'index']
)->name('dashboard');

Route::post('/dashboard/store', [JadwalController::class, 'store']
)->name('jadwal.store');

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});
