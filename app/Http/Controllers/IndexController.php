<?php

namespace App\Http\Controllers;
use App\Models\Place;
use CreatePlacesTable;
use App\Models\Reason;
use CreateReasonsTable;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {   
        $places = Place::get();
        $reasons = Reason::get();
        return view('index',[
            'places' => $places,
            'reasons' =>$reasons
        ]);   
        
    }
}
