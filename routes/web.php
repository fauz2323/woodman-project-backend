<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [App\Http\Controllers\AuthController::class,'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');
    Route::get('/logout', [App\Http\Controllers\AuthController::class,'logout'])->name('logout');
});
