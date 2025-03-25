<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/contenders', function () {
    return view('contenders');
})->name('contenders');
