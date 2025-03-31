<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function createTeam(Request $request) {

        $team = new Team;

        $team->name = $request->name;

        $team->save();

        return redirect()->route('teams');
    }
}
