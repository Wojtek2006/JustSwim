<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return view('index');
    }

    public function contenders() {
        return view('contenders');
    }

    public function teams() {
        return view('teams');
    }

    public function competitions() {
        return view('competitions');
    }
}
