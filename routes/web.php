<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('contenders');
// });


Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/contenders', [PageController::class, 'contenders'])->name('contenders');
Route::get('/teams', [PageController::class, 'teams'])->name('teams');
Route::get('/competitions', [PageController::class, 'competitions'])->name('competitions');
