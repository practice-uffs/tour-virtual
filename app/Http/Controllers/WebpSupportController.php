<?php

namespace App\Http\Controllers;

use App\Models\FigmaMap;

class WebpSupportController extends Controller
{
    public function support()
    {
        if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false ) {    // webp is supported!
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function landingPage()
    {
        $data = FigmaMap::all();
        return view('landingpage', ['data' => $data, 'webpsupport' => $this->support()]);
    }
}