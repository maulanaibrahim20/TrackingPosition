<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome ');
});

Route::get('/logout', LogoutController::class)
    ->name('auth.logout');
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'proccess']);

Route::get('/admin/dashboard', [DashboardController::class, 'admin']);
Route::get('/management/dashboard', [DashboardController::class, 'management']);
Route::get('/user/dashboard', [DashboardController::class, 'user']);
