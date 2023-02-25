<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function index(){
        $data = $this->formatData();
        return view('index', ['data' => $data]);
    }

    private function formatData(): array
    {
        $dataInfo = Information::all()->toArray();
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
