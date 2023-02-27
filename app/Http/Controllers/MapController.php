<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function index(){
        $data = $this->formatData(Information::all()->toArray());
        return view('index', ['data' => $data, 'campus' => 'ls', 'titulo' => 'Laranjeiras do Sul']);
    }

    public function laranjeiras(){
        $data = $this->formatData(Information::query()->where('campus', 'LS')->get()->toArray());
        return view('index', ['data' => $data, 'campus' => 'ls', 'titulo' => 'Laranjeiras do Sul']);

    }

    public function chapeco(){
        $data = $this->formatData(Information::query()->where('campus', 'CH')->get()->toArray());
        return view('index', ['data' => $data, 'campus' => 'ch', 'titulo' => 'Chapecó']);
    }

    public function cerro_largo(){

    }

    public function erechim(){

    }

    public function realeza(){

    }

    private function formatData($dataInfo): array
    {
        $dataDetail = Detail::all()->toArray();
        foreach ($dataInfo as $key => $value ){
            $dataInfo[$key]['list_description'] = array();

            foreach ($dataDetail as $k => $v){
                if($dataInfo[$key]['id'] == $v['id_information']){
                    $dataInfo[$key]['list_description'][] = $v['item'];

                }
            }
        }
        return $dataInfo;
    }
}
