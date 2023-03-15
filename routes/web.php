<?php

use App\Http\Controllers\FigmaMapController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Fix wrong style/mix urls when being served from reverse proxy
$proxy_url    = env('PROXY_URL');
$proxy_schema = env('PROXY_SCHEME');

if (!empty($proxy_url)) {
   URL::forceRootUrl($proxy_url);
}

if (!empty($proxy_schema)) {
   URL::forceScheme($proxy_schema);
}

Route::get('/', function () {
    return view('landingpage');
})->name('home');

Route::prefix('/cl')->group(function (){
    Route::get('/', [MapController::class, 'cerro_largo'])->name('map.cl');
    Route::get('/panorama', function (){
        return redirect()->route('home');
    })->name('panorama.cl');
});
Route::prefix('/ch')->group(function (){
    Route::get('/', [MapController::class, 'chapeco'])->name('map.ch');
    Route::get('/panorama', function (){
        return view('panorama.ch');
    })->name('panorama.ch');
});
Route::prefix('/er')->group(function (){
    Route::get('/', [MapController::class, 'erechim'])->name('map.er');
    Route::get('/panorama', function (){
        return redirect()->route('home');
    })->name('panorama.er');
});

Route::prefix('/ls')->group(function (){
    Route::get('/', [MapController::class, 'laranjeiras'])->name('map.ls');
    Route::get('/panorama', function (){
        return view('panorama.ls');
    })->name('panorama.ls');
});

Route::prefix('/pf')->group(function (){
    Route::get('/', [MapController::class, 'passo_fundo'])->name('map.pf');
    Route::get('/panorama', function (){
        return redirect()->route('home');
    })->name('panorama.pf');
});

Route::prefix('/re')->group(function (){
    Route::get('/', [MapController::class, 'realeza'])->name('map.re');
    Route::get('/panorama', function (){
        return redirect()->route('home');
    })->name('panorama.re');
});




Route::prefix('admin')->group(function (){
    Route::get("/", function (){
        return view('admin.index');
    })->name('admin.index')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    Route::resource('/information', InformationController::class)->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    Route::get('/mapa', [FigmaMapController::class, 'index'])->name('figma_map.index')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    Route::get('/mapa/{figma_map}/edit', [FigmaMapController::class, 'edit'])->name('figma_map.edit')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
});


