<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Team;
class CompetitionController extends Controller
{
    public function store(Request $request)
    {

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

    public function addTeam(Request $request, Competition $competition)
    {
        // dd($competition, $request->team_id);
        DB::table('team_competition_relation')->insert([
            'teamID' => $request->team_id,
            'competitionID' => $competition->id
        ]);

        return redirect()->route('show.competition', $competition->id)->with('message', 'Drużyna dodana do zawodów');
    }
    public function removeTeam(Competition $competition, Team $team)
    {
        DB::table('team_competition_relation')
            ->where('teamID', "=", $team->id)
            ->where('competitionID', "=", $competition->id)
            ->delete();
        // dd($competition->id, $team->id, $del);

        return redirect()->route('show.competition', $competition->id)->with('message', 'Drużyna usunięta z zawodów');
    }

    public function kickTeam()
    {

    }

}
