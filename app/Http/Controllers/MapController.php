<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(){
        $data = Information::all();
        //

        return view('index', ['data' => $data]);
    }
}
