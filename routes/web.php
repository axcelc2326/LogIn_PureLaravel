<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('home.index');
})->name('home');

Route::get('/events', function () {
    return view('events.index');
})->name('events')->middleware(['auth', 'can:view-events']);

Route::get('/transaction', function () {
    return view('transaction.index');
})->name('transaction')->middleware(['auth', 'can:manage-transactions']);

Route::get('/profile', function () {
    return view('profile.index');
})->name('profile')->middleware(['auth']);

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/signin', [LoginController::class, 'login'])->name('signin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
