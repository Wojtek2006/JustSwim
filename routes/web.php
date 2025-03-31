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
Route::post('/contenders', [ContenderController::class, 'createContender'])->name('createContender');

// COMPETITION MODEL SEGMENT
Route::post('/competitions', [CompetitionController::class, 'createCompetition'])->name('createCompetition');

// TEAM MODEL SEGMENT
Route::post('/teams', [TeamController::class, 'createTeam'])->name('createTeam');
