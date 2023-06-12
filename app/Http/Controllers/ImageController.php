<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FigmaMap;
use App\Models;
use Buglinjo\Webp\Controllers\WebpController;

class ImageController extends Controller
{
    public function upload(Request $request, FigmaMap $figma_map)
    {
        $name = $figma_map->getAttribute('name');

        $path = $request->file('imagem')->store('img/slider');
        $file = $request->file('imagem');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('img/slider'), $fileName);

        $webp = Webp::make($request->file('imagem'));

        $webp->save(public_path('img/slider'));

        $figma_map->image_link = $fileName;
        $figma_map->save();
        return redirect()->back()->with('success', "Imagem do $name atualizada com sucesso");
    }
}
