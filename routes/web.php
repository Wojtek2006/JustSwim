<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContenderController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\TeamController;
use App\Models\Competition;

// PAGE SEGMENT
Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/contenders', [PageController::class, 'contenders'])->name('contenders');
Route::get('/teams', [PageController::class, 'teams'])->name('teams');
Route::get('/competitions', [PageController::class, 'competitions'])->name('competitions');
Route::get('/showCompetition/{competition}', [PageController::class, 'showCompetition'])->name('show.competition');
Route::get('/showTeam/{team}', [PageController::class, 'showTeam'])->name('show.team');
Route::get('/showCompetition/generateTracks/{competition}', [PageController::class, 'generateTracks'])->name('generate.tracks');

// CONTENDER MODEL SEGMENT
Route::post('/contenders', [ContenderController::class, 'store'])->name('contender.store');
Route::delete('/contenders/{contender}', [ContenderController::class, 'destroy'])->name('contender.destroy');
Route::post('/contenders/update/{contender}', [ContenderController::class, 'update'])->name('contender.update');
Route::post('/contenders/assignTeam/{contender}', [ContenderController::class, 'assignTeam'])->name('contender.assignTeam');
Route::post('/contenders/unassignTeam/{contender}', [ContenderController::class, 'unassignTeam'])->name('contender.unassignTeam');

// COMPETITION MODEL SEGMENT
Route::post('/competitions', [CompetitionController::class, 'store'])->name('competition.store');
Route::delete('/competitions/{competition}', [CompetitionController::class, 'destroy'])->name('competition.destroy');
Route::post('/competitions/{competition}', [CompetitionController::class, 'update'])->name('competition.update');
Route::post('/competitions/addTeam/{competition}', [CompetitionController::class, 'addTeam'])->name('competition.addTeam');
Route::post('/competitions/removeTeam/{competition}/{team}', [CompetitionController::class, 'removeTeam'])->name('competition.removeTeam');

// TEAM MODEL SEGMENT
Route::post('/teams', [TeamController::class, 'store'])->name('team.store');
Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('team.destroy');
Route::post('/teams/update/{team}', [TeamController::class, 'update'])->name('team.update');
