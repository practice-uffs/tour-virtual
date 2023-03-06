<?php

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
});
Route::get('/cl', [MapController::class, 'cerro_largo'])->name('cl');
Route::get('/ch', [MapController::class, 'chapeco'])->name('ch');
Route::get('/er', [MapController::class, 'erechim'])->name('er');
Route::get('/ls', [MapController::class, 'laranjeiras'])->name('ls');
Route::get('/pf', [MapController::class, 'passo_fundo'])->name('pf');
Route::get('/re', [MapController::class, 'realeza'])->name('re');


Route::get('/panorama', function () {
    return view('panorama');
})->name('panorama');


Route::get('/admin', function (){
    return redirect()->route('information.index');
});


Route::prefix('admin')->group(function (){
    Route::resource('/information', InformationController::class)->middleware(['check.admin', 'verified', 'auth:sanctum' ]);
});
