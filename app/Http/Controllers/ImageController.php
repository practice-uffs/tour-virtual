<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FigmaMap;
use App\Models;

class ImageController extends Controller
{
    public function upload(Request $request, FigmaMap $figma_map)
    {
        $name = $figma_map->getAttribute('name');

        $path = $request->file('imagem')->store('img/slider');
        $file = $request->file('imagem');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('img/slider'), $fileName);

        $figma_map->image_link = $fileName;
        $figma_map->save();
        return redirect()->back()->with('success', "Imagem do $name atualizada com sucesso");
    }
}
