<?php

use Illuminate\Suppolort\Facades\Route;

Route::get('/login', function () {
    return view('login');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/register', function () {
    return view('register');
});