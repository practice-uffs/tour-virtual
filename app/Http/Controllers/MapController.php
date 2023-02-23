<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function index(){
        $data = Information::all();
        //$data2 = DB::table('informations')->join('details', 'informations.id', '=', 'details.id_information')->get();
        //dd($data2->union($data));

        return view('index', ['data' => $data]);
    }
}
