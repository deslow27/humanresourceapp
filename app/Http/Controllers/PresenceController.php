<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use Illuminate\Http\Request;


class PresenceController extends Controller
{
    //
    public function index(){
        $presences = Presence::all();
        return view("presences.index", compact("presences"));
    }
}
