<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Images;
use App\Http\Controllers\WebpSupportController;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;

class ContribuaController extends Controller
{
    protected static $rules = [
        'nome' => 'required',
        'email' => 'required | email',
        'type' => 'required',
        'imagem' => 'required',
    ];

    protected static $feedback = [
        'required' => "Campo é necessario",
        'email' => "O email é inválido",
    ];

    public function upload(Request $request)
    {
        $request->validate(ContribuaController::$rules, ContribuaController::$feedback);

        $nome = $request->input('nome');
        $email = $request->input('email');
        $estrutura = $request->input('type');
        $comentario = $request->input('comentario');
        $campus = $request->get('campus');

        $fileName = ImageController::upload($request);
        $file = $request->file('imagem');
        $extension = $file->getClientOriginalExtension();

        $images = new Images();

        $images->file_name = $fileName.'.'.$extension;
        $images->autor = $nome;
        $images->email = $email;
        $images->estrutura = $estrutura;
        $images->situacao = false;
        $images->comentario = $comentario;
        $images->campus = $campus;
        $images->save();

        return redirect()->back()->with('contribua', 'success')->header('refresh', '5;url=' . url()->previous());
    }

    public function getOptions(String $campus)
    {
        $data = Information::query()->where('campus', $campus)->pluck('title')->toArray();
        foreach ($data as $key => $title) {
            $result[$title] = $key;
        }
        return $result;
    }

    public function index()
    {
        $data = Images::query()->orderBy('created_at', 'desc')->get();
        return view('contribua.index' ,['data' => $data]);
    }
}