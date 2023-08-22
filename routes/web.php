<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FigmaMapController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\WebpSupportController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;
use App\Models\FigmaMap;
use App\Http\Controllers\Model3dController;
use App\Http\Controllers\DetailController;

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

Route::get('/', [LandingPageController::class, 'index'])->name('home');

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
    Route::get('/{ID_element}/{titulo}/3d', [Model3dController::class, 'index'])->name('ch.model3d');
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
    Route::get('/campus', [FigmaMapController::class, 'index'])->name('campus.index')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    Route::get('/campus/edit/{figma_map}', [FigmaMapController::class, 'edit'])->name('campus.edit')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    Route::get('/campus/{figma_map}/refresh', [FigmaMapController::class, 'refresh'])->name('campus.refresh')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    Route::get('/feedback',[FeedbackController::class, 'index'])->name('feedback.index')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    Route::resource('/model3d', Model3dController::class)->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    // Route::get('/model3d/create',[Model3dController::class, 'create'])->name('model3d.create')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    // Route::POST('/model3d/store',[Model3dController::class, 'store'])->name('model3d.store')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    Route::get('/feedback/{feedback}',[FeedbackController::class, 'show'])->name('feedback.show')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    Route::delete('/feedback/{feedback}',[FeedbackController::class, 'destroy'])->name('feedback.destroy')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    Route::post('/campus/{figma_map}/image', [ImageController::class, 'sliderUpload'])->name('image.upload')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
    Route::get('/details/{detail}/edit',[DetailController::class, 'edit'])->name('detail.edit')->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
});


Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.send');