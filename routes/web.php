<?php

use App\Http\Controllers\ProcesoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\UserController;
use App\Models\Proceso;
use App\Models\Receta;
use App\Models\User;

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
    //return view('dashboard');
    return redirect()->route('recetas.index');
})->name('dashboard');


Route::middleware('auth')->group(function(){

    Route::get('users/{user}/perfil',[UserController::class,'perfil'])->name('usuario.perfil');

    Route::get('/recetas/{receta}/ingredientes',[RecetaController::class,'ingredientes'])->name('recetas.ingredientes');
    Route::post('/recetas/{receta}/ingrediente',[RecetaController::class,'agregarIngrediente'])->name('recetas.agregarIngrediente');
    Route::delete('/recetas/{receta}/ingrediente/{ingrediente}',[RecetaController::class,'eliminarIngrediente'])->name('recetas.eliminarIngrediente');
    Route::get('/recetas/{receta}/agregarProceso',[RecetaController::class,'agregarProcesos'])->name('recetas.agregarProcesos');
    Route::resource('/recetas',RecetaController::class);
    Route::resource('/procesos',ProcesoController::class);
});

