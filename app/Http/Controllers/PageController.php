<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contender;
use App\Models\Competition;

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
        return view('teams');
    }

    public function competitions() {
        $competitions = Competition::all();

        return view('competitions', ['competitions' => $competitions]);
    }
}
