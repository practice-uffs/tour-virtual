<?php

namespace App\Http\Controllers;

use App\Models\FigmaMap;
use App\Http\Controllers\WebpSupportController;

class LandingPageController extends Controller
{
    public function index()
    {
        $data = FigmaMap::all();

        $webpController = new WebpSupportController;
        $webpsupport = $webpController->support();

        return view('landingpage', ['data' => $data, 'webpsupport' => $webpsupport]);
    }
}