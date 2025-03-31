<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;

class CompetitionController extends Controller
{
    public function createCompetition(Request $request) {

        $competition = new Competition;

        $competition->name = $request->name;

        $competition->save();

        return redirect()->route('competitions');
    }
}
