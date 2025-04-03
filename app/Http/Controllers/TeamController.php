<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function store(Request $request) {

        $team = new Team;

        $team->name = $request->name;
        $team->shortcut = $request->shortcut;

        $team->save();

        return redirect()->route('teams')->with('message', 'Drużyna dodana pomyślnie');
    }

    public function destroy(Team $team)
    {
        
        $team->delete();
        return redirect()->route('contenders')->with('message', 'Użytkownik ' . $team->name . ' usunięty pomyślnie');
    }

    public function update(Request $request, Team $team)
    {

        $team->name = $request->name;
        $team->shortcut = $request->shortcut;

        $team->save();

        return redirect()->route('contenders')->with('message', 'Użytkownik ' . $team->name . ' zmieniony pomyślnie');
    }
}
