<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contender;

class ContenderController extends Controller
{
    
    public function createContender(Request $request) {

        $contender = new Contender;

        $contender->name = $request->name;
        $contender->last_name = $request->last_name;
        $contender->class = $request->class;
        $contender->gender = $request->gender;
        $contender->status = $request->status;

        $contender->save();

        return redirect()->route('contenders');
    }
}
