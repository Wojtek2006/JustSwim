<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContenderController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\TeamController;


// PAGE SEGMENT
Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/contenders', [PageController::class, 'contenders'])->name('contenders');
Route::get('/teams', [PageController::class, 'teams'])->name('teams');
Route::get('/competitions', [PageController::class, 'competitions'])->name('competitions');


// CONTENDER MODEL SEGMENT
Route::post('/contenders', [ContenderController::class, 'store'])->name('contender.store');
Route::delete('/contenders/{id}', [ContenderController::class, 'destroy'])->name('contender.destroy');

// COMPETITION MODEL SEGMENT
Route::post('/competitions', [CompetitionController::class, 'store'])->name('competition.store');

// TEAM MODEL SEGMENT
Route::post('/teams', [TeamController::class, 'store'])->name('team.store');
