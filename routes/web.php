<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;

Route::get('/', [PageController::class, 'inicio']);
Route::get('/servicios', [PageController::class, 'servicios']);
Route::get('/nosotros', [PageController::class, 'nosotros']);
Route::get('/contacto', [PageController::class, 'contacto']);

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::view('/dashboard', 'dashboard.pages.dashboard');
