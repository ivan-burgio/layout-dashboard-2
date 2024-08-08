<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'inicio']);
Route::get('/servicios', [PageController::class, 'servicios']);
Route::get('/nosotros', [PageController::class, 'nosotros']);
Route::get('/contacto', [PageController::class, 'contacto']);
Route::get('/login', [PageController::class, 'login']);
