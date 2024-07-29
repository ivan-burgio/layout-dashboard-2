<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.inicio');
});

Route::get('/servicios', function () {
    return view('pages.servicios');
});

Route::get('/nosotros', function () {
    return view('pages.nosotros');
});

Route::get('/contacto', function () {
    return view('pages.contacto');
});
