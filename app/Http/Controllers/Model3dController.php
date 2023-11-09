<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Model3d;

class Model3dController extends Controller
{
 
    public function index(Request $request)
    {
        $data = Model3d::query()->orderBy('created_at', 'desc')->get();
        return view('admin.model3d.list', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $data = Model3d::query()->orderBy('created_at', 'desc')->get();
        return view('admin.model3d.create');
    }


    public function store(Request $request)
    {
        $item = Model3d::create($request->all());
       
        return redirect()->route('model3d.index');
    }

    public function storeLocation(Request $request)
    {
        $item = Model3d::create($request->all());
        return redirect()->route('model3d.index');
    }



    public function edit(Model3d $model3d){
        return view('admin.model3d.pinModel', ['model3d' => $model3d]);
    }

    public function display(){
        $data = Model3d::query()->orderBy('created_at', 'desc')->get();
        return view('admin.model3d.list', ['data' => $data]);
    }
}
?>

