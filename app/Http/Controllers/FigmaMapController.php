<?php

namespace App\Http\Controllers;

use App\Models\FigmaMap;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\In;

class FigmaMapController extends Controller
{


   public function requestFigma($name, $campus){

       $query = FigmaMap::query()->where('name', '=', $name)->where('campus', '=', $campus)->first();
       if(!$query)
           return null;
       $FILE_KEY = $query['file_key'];
       $NODE_ID = $query['node_id'];
       $URL = "https://api.figma.com/v1/images/$FILE_KEY?ids=$NODE_ID&format=svg&svg_include_id=true";
       $response = Http::withHeaders(['X-FIGMA-TOKEN' => env('FIGMA_TOKEN')])->get($URL);

       if($response->ok()){
           $URL_SVG = $response->json()['images'][$NODE_ID];
           return Http::get($URL_SVG)->body();
       }
       return null;
   }

    public  function index(){
       $data = FigmaMap::query()->where('name', '=', 'Principal')->get();
       foreach ($data as $k => $v){
           $campus = Information::siglaCampus($v['campus']);
           $v['campus'] = $campus;
           $data[$k] = $v;
       }
       return view('mapa_figma.index', ['data' => $data]);
    }

    public function edit(FigmaMap $figma_map){
        $name = $figma_map->getAttribute('name');
        $campus = $figma_map->getAttribute('campus');
        $SVG = $this->requestFigma($name, $campus);
        $xml = simplexml_load_string($SVG);
        $viewbox = null;
        if($xml && $xml->attributes()->viewBox){
            $viewbox= $xml->attributes()->viewBox;
        }
        if($SVG){
            $dir = strtolower($campus) ."/". $figma_map->getAttribute('file_name');
            if(Storage::disk('mapa')->exists($dir)){
                Storage::disk('mapa')->delete($dir);
            }
            Storage::disk('mapa')->put($dir, $SVG);
            $figma_map->touch();
            if($viewbox){
                $figma_map->update(['viewport' => $viewbox]);
            }
            $campus = Information::siglaCampus($campus);
            return redirect()->back()->with('success', "$campus atualizado com sucesso");

        }
        $campus = Information::siglaCampus($campus);
        return redirect()->back()->withErrors(['msg' => "Não foi possivel atualizar o mapa de $campus"]);

    }
}
