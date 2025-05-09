<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contender;

class ContenderController extends Controller
{

    public function store(Request $request)
    {

        $contender = new Contender;

        $contender->name = $request->name;
        $contender->last_name = $request->last_name;
        $contender->class = $request->class;
        $contender->gender = $request->gender;
        $contender->status = $request->status;

        $contender->save();

        return redirect()->route('contenders')->with('message', 'Użytkownik ' . $contender->name . ' dodany pomyślnie');
    }

    public function destroy(Contender $contender)
    {
        
        $contender->delete();
        return redirect()->route('contenders')->with('message', 'Użytkownik ' . $contender->name . ' usunięty pomyślnie');
    }

    public function update(Request $request, Contender $contender)
    {

        $contender->name = $request->name;
        $contender->last_name = $request->last_name;
        $contender->class = $request->class;
        $contender->gender = $request->gender;
        $contender->status = $request->status;

        $contender->save();

        return redirect()->route('contenders')->with('message', 'Użytkownik ' . $contender->name . ' zmieniony pomyślnie');
    }

    public function assignTeam(Request $request, Contender $contender){
        $contender->team_id = $request->team_id;
        
        $contender->save();
        
        return redirect()->route('contenders')->with('message', 'Użytkownik ' . $contender->name . ' przypisany do drużyny');    
    }

    public function unassignTeam(Contender $contender){
        $contender->team_id = null;
        $contender->save();

        return redirect()->route('contenders')->with('message', 'Użytkownik ' . $contender->name . ' usunięty z drużyny');    
        
    }
}
