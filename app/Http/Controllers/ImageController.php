<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FigmaMap;
use App\Models;
use WebPConvert\WebPConvert;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
            $path = $request->file('imagem')->store('img/geral');
            $file = $request->file('imagem');
            $extension = $file->getClientOriginalExtension();
            $fileName = 'imagem_' . date('YmdHisv');
            $file->move(public_path('img/geral'), $fileName.'.'.$extension);

            $source = public_path('img/geral/').$fileName.'.'.$extension;
            $destination = public_path('img/webp/').$fileName.'.webp';
            $options = [];
            WebPConvert::convert($source, $destination, $options);

            return $fileName;
    }

    public function sliderUpload(Request $request, FigmaMap $figma_map)
    {
            $name = $figma_map->getAttribute('name');

            $fileName = $this->upload($request);
            $file = $request->file('imagem');
            $extension = $file->getClientOriginalExtension();

            $figma_map->image_link = $fileName.'.'.$extension;
            $figma_map->save();
            
            return redirect()->back()->with('success', "Imagem de $name atualizada com sucesso");
    }
}
