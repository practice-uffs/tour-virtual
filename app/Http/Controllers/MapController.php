<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\FigmaMap;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{

    public function laranjeiras(){
        return view('index', $this->get_data('LS', 'Laranjeiras do Sul', false));

    }

    public function chapeco(){
        return view('index', $this->get_data('CH', 'Chapecó', true));
    }

    public function cerro_largo(){
        return view('index', $this->get_data('CL', 'Cerro Largo', true));

    }

    public function erechim(){
        return view('index', $this->get_data('ER', 'Erechim', true));
    }

    public function realeza(){
        return view('index', $this->get_data('RE', 'Realeza', true));
    }

    public function passo_fundo(){
        return view('index', $this->get_data('PF', 'Passo Fundo', true));
    }

    private function get_data($campus, $titulo, $popup){
        $data = $this->formatData(Information::query()->where('campus', $campus)->get()->toArray());
        $viewport = FigmaMap::query()->where('campus', $campus)->first();
        if($viewport){
            $viewport = $viewport['viewport'];
        }
        return ['data' => $data, 'campus' => strtolower($campus), 'titulo' => $titulo , 'viewport' => $viewport ,'popup' => $popup];
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
