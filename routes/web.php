<?php

use App\Http\Auth\LoginController;
use Illuminate\Support\Facades\Route;
Route::view('/', 'app.home')->middleware('auth')->name('home');

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//Route::post('/login', ...)