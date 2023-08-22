<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\FigmaMap;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpIfc\PhpIfcParser\Parser;

class MapController extends Controller
{
    public function model3d($ID_element){


        return view('model3d');
    }

    public function laranjeiras(){
        return view('index', $this->get_data('LS', 'Laranjeiras do Sul', 'Laranjeiras do Sul', false));
    }

    public function laranjeiras_Info($ID_element){
        $validator = Validator::make(['id' => $ID_element], [
            'id' => 'required | numeric'
        ]);
        if ($validator->fails()) {
            abort(404);
        }else {
            $titulo = Information::query()->where('component', '#item'.$ID_element)->where('campus', 'LS')->get('title');
            return view('index', $this->get_data('LS', 'Laranjeiras do Sul', str_replace(' ', '-', $titulo[0]->title ), false), ['ID_element' => $ID_element]);
        }
    }


    public function chapeco(){
        // dd($information);
        return view('index', $this->get_data('CH', 'Chapecó', 'Chapecó', false), ['ID_element' => null]);
    }

    public function chapeco_Info($ID_element){
        $validator = Validator::make(['id' => $ID_element], [
            'id' => 'required | numeric'
        ]);
        if ($validator->fails()) {
            abort(404);
        }else {
            $titulo = Information::query()->where('component', '#item'.$ID_element)->where('campus', 'CH')->get('title');
            return view('index', $this->get_data('CH', 'Chapecó', str_replace(' ', '-', $titulo[0]->title ), false), ['ID_element' => $ID_element]);
        }
    }

    public function cerro_largo(){
        return view('index', $this->get_data('CL', 'Cerro Largo', 'Cerro Largo', true));
    }

    public function cerro_largo_Info($ID_element, $titulo = null){
        $campus = 'Cerro Largo';
        $validator = Validator::make(['id' => $ID_element], [
            'id' => 'required | numeric'
        ]);
        if ($validator->fails()) {
            abort(404);
        }else {
            $titulo = Information::query()->where('component', '#item'.$ID_element)->where('campus', 'CL')->get('title');
            return view('index', $this->get_data('CL',  'Cerro Largo', str_replace(' ', '-', $titulo[0]->title ), true), ['ID_element' => $ID_element]);
        }
    }

    public function erechim(){
        return view('index', $this->get_data('ER', 'Erechim', 'Erechim', true));
    }

    public function erechim_Info($ID_element, $titulo = null){
        $validator = Validator::make(['id' => $ID_element], [
            'id' => 'required | numeric'
        ]);
        if ($validator->fails()) {
            abort(404);
        }else {
            $titulo = Information::query()->where('component', '#item'.$ID_element)->where('campus', 'ER')->get('title');
            return view('index', $this->get_data('ER', 'Erechim', str_replace(' ', '-', $titulo[0]->title ), true), ['ID_element' => $ID_element]);
        }
    }

    public function realeza(){
        return view('index', $this->get_data('RE', 'Realeza','Realeza', true));
    }

    public function realeza_Info($ID_element, $titulo = null){
        $validator = Validator::make(['id' => $ID_element], [
            'id' => 'required | numeric'
        ]);
        if ($validator->fails()) {
            abort(404);
        }else {
            $titulo = Information::query()->where('component', '#item'.$ID_element)->where('campus', 'RE')->get('title');
            return view('index', $this->get_data('RE', 'Realeza', str_replace(' ', '-', $titulo[0]->title ), true), ['ID_element' => $ID_element]);
        }
    }

    public function passo_fundo(){
        return view('index', $this->get_data('PF', 'Passo Fundo', 'Passo Fundo', true));
    }

    public function passo_fundo_Info($ID_element, $titulo = null){
        $validator = Validator::make(['id' => $ID_element], [
            'id' => 'required | numeric'
        ]);
        if ($validator->fails()) {
            abort(404);
        }else {
            $titulo = Information::query()->where('component', '#item'.$ID_element)->where('campus', 'PF')->get('title');
            return view('index', $this->get_data('PF', 'Passo Fundo', str_replace(' ', '-', $titulo[0]->title ), true), ['ID_element' => $ID_element]);
        }
    }

    private function get_data($campus, $campus_name, $titulo, $popup){
        $data = $this->formatData(Information::query()->where('campus', $campus)->get()->toArray());
        $viewport = FigmaMap::query()->where('campus', $campus)->first();
        if($viewport){
            $viewport = $viewport['viewport'];
        }
        return ['data' => $data, 'campus' => strtolower($campus), 'campus_name' => $campus_name , 'titulo' => $titulo , 'viewport' => $viewport ,'popup' => $popup];
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
