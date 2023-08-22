<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;

class DetailController extends Controller
{
    //


    public function edit(Detail $detail)
    {

        // $htmlConverter = new HtmlConverter(); // Html to Markdown
        // $information['description'] = $htmlConverter->convert($information['description']);

        // $data =  Detail::where('id_information', $information->getAttribute('id'));
        // $data = $data->get();
        // foreach ($data as $k => $v){
        //     $data[$k]['item'] = $htmlConverter->convert($v['item']);
        // }

        return view('admin.detail.model3d');
    }


}
