<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;

class CompetitionController extends Controller
{
    public function store(Request $request) {

        $competition = new Competition;

        $competition->name = $request->name;
        $competition->date = $request->date;
        $competition->start_time = $request->start_time;
        

        $competition->save();

        return redirect()->route('competitions')->with('message', 'Zawody dodane pomyślnie');
    }

    public function destroy(Competition $competition)
    {
        
        $competition->delete();
        return redirect()->route('competitions')->with('message', 'Zawody ' . $competition->name . ' usunięty pomyślnie');
    }

    public function update(Request $request, Competition $competition)
    {

        $competition->name = $request->name;
        $competition->date = $request->date;
        $competition->start_time = $request->start_time;

        $competition->save();

        return redirect()->route('competitions')->with('message', 'Użytkownik ' . $competition->name . ' zmieniony pomyślnie');
    }
}
