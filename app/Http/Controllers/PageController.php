<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contender;
use App\Models\Competition;
use App\Models\Team;

class PageController extends Controller
{
    public function index() {
        return view('index');
    }

    public function contenders() {
        $contenders = Contender::all();

        return view('contenders', ['contenders' => $contenders]);
    }

    public function teams() {
        $teams = Team::all();

        return view('teams', ['teams' => $teams]);
    }

    public function competitions() {
        $competitions = Competition::all();

        return view('competitions', ['competitions' => $competitions]);
    }
}
