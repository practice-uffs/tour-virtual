<?php

use App\Http\Controllers\FeedbackController;
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
    Route::get('/panorama', function (){
        return redirect()->route('home');
    })->name('panorama.cl');
    Route::get('/{ID_element}/{titulo}', [MapController::class, 'cerro_largo_Info'])->name('map.cl.element');
    Route::get('/{ID_element}', [MapController::class, 'cerro_largo_Info'])->name('map.cl.element2');
    Route::get('/', [MapController::class, 'cerro_largo'])->name('map.cl');
});

Route::prefix('/ch')->group(function (){
    Route::prefix('/panorama')->group(function (){
        Route::get('/', function (){
            return view('panorama.ch', ['campus_name' => 'Chapecó'], ['campus' => 'ch']);
        })->name('panorama.ch');
    });
    Route::get('/{ID_element}/{titulo}', [MapController::class, 'chapeco_Info'])->name('map.ch.element');
    Route::get('/{ID_element}', [MapController::class, 'chapeco_Info'])->name('map.ch.element2');
    Route::get('/', [MapController::class, 'chapeco'])->name('map.ch');
});

Route::prefix('/er')->group(function (){
    Route::get('/panorama', function (){
        return redirect()->route('home');
    })->name('panorama.er');
    Route::get('/{ID_element}/{titulo}', [MapController::class, 'erechim_Info'])->name('map.er.element');
    Route::get('/{ID_element}', [MapController::class, 'erechim_Info'])->name('map.er.element2');
    Route::get('/', [MapController::class, 'erechim'])->name('map.er');
});

Route::prefix('/ls')->group(function (){
    Route::get('/panorama', function (){
        return view('panorama.ls', ['campus_name' => 'Laranjeiras do Sul'], ['campus' => 'ls']);
    })->name('panorama.ls');
    Route::get('/{ID_element}/{titulo}', [MapController::class, 'laranjeiras_Info'])->name('map.ls.element');
    Route::get('/{ID_element}', [MapController::class, 'laranjeiras_Info'])->name('map.ls.element2');
    Route::get('/', [MapController::class, 'laranjeiras'])->name('map.ls');
});

Route::prefix('/pf')->group(function (){
    Route::get('/panorama', function (){
        return redirect()->route('home');
    })->name('panorama.pf');
    Route::get('/{ID_element}/{titulo}', [MapController::class, 'passo_fundo_Info'])->name('map.pf.element');
    Route::get('/{ID_element}', [MapController::class, 'passo_fundo_Info'])->name('map.pf.element2');
    Route::get('/', [MapController::class, 'passo_fundo'])->name('map.pf');
});

Route::prefix('/re')->group(function (){
    Route::get('/panorama', function (){
        return redirect()->route('home');
    })->name('panorama.re');
    Route::get('/{ID_element}/{titulo}', [MapController::class, 'realeza_Info'])->name('map.re.element');
    Route::get('/{ID_element}', [MapController::class, 'realeza_Info'])->name('map.re.element2');
    Route::get('/', [MapController::class, 'realeza'])->name('map.re');
});

Route::prefix('admin')->group(function (){
    Route::get("/", function (){
        return view('admin.index');
    })->name('admin.index')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    Route::resource('/information', InformationController::class)->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    Route::get('/mapa', [FigmaMapController::class, 'index'])->name('figma_map.index')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    Route::get('/mapa/{figma_map}/edit', [FigmaMapController::class, 'edit'])->name('figma_map.edit')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    Route::get('/feedback',[FeedbackController::class, 'index'])->name('feedback.index')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    Route::get('/feedback/{feedback}',[FeedbackController::class, 'show'])->name('feedback.show')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    Route::delete('/feedback/{feedback}',[FeedbackController::class, 'destroy'])->name('feedback.destroy')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
});


Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.send');