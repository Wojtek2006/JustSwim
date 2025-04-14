<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contender;
use App\Models\Competition;
use App\Models\Team;



class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function contenders()
    {
        $contenders = Contender::leftJoin('teams', 'contenders.team_id', '=', 'teams.id')
            ->select('contenders.*', 'teams.name as team_name', 'teams.shortcut as team_shortcut')
            ->get();

        $teams = Team::all();
        return view('contenders', ['contenders' => $contenders], ['teams' => $teams]);
    }

    public function teams()
    {
        $teams = Team::all();

        return view('teams', ['teams' => $teams]);
    }

    public function competitions()
    {
        $competitions = Competition::all();

        return view('competitions', ['competitions' => $competitions]);
    }

    public function showCompetition(Competition $competition) {

        $teams = [];

        $relations = DB::table('team_competition_relation')
            ->where('competitionID', '=', $competition->id)
            ->get();

        foreach($relations as $relation) {
            $teams[] = DB::table('teams')
            ->where('id', '=', $relation->teamID)
            ->select('name', 'shortcut')
            ->get();
        }

        return view('showCompetition', ['competition' => $competition, 'teams' => $teams]);
    }

    public function showTeam(Team $team) {

        $contenders = Contender::where('team_id', $team->id)->get();

        $team = DB::table('teams')
            ->where('id', '=', $team->id)
            ->select('name')
            ->get();

        return view('showTeam', ['contenders' => $contenders, 'team' => $team]);
    }

    public function generateTracks(Competition $competition) {
        
        $teams = [];

        $relations = DB::table('team_competition_relation')
            ->where('competitionID', '=', $competition->id)
            ->get();

        foreach($relations as $relation) {
            $teams[] = DB::table('teams')
            ->where('id', '=', $relation->teamID)
            ->select('id')
            ->get();
        }

        dd($teams);

    }
}
