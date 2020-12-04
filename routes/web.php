<?php

use App\Http\Controllers\ProcesoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetaController;
use App\Models\Proceso;
use App\Models\Receta;

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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/recetas/{Receta}/ingredientes',[RecetaController::class,'ingredientes'])->name('recetas.ingrediente')->middleware('auth');
Route::post('/recetas/{Receta}/ingredientes',[RecetaController::class,'agregarIngrediente'])->name('recetas.agregarIngrediente')->middleware('auth');
Route::delete('/recetas/{Receta}/{Ingrediente}',[RecetaController::class,'eliminarIngrediente'])->name('recetas.eliminarIngrediente')->middleware('auth');

Route::get('/recetas/{Receta}/agregarProceso',[RecetaController::class,'agregarProcesos'])->name('recetas.agregarProcesos')->middleware('auth');
Route::resource('/recetas',RecetaController::class)->middleware('auth');

Route::resource('/procesos',ProcesoController::class)->middleware('auth');