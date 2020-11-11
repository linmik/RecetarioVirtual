<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas = Receta::all();
        return view('recetas.recetaIndex',compact('recetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recetas.recetaForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario' => ['string','max:255','required'],
            'titulo' => ['string','max:255','required'],
            'descripcion' => ['required'],
            'costo' => ['numeric','required','min:0'],
            'num_personas' => ['numeric','required','min:1','max:1000'],
            'imagen' => ['url','string'],
            'categoria' => ['string', "required","max:255"]
        ]);
        Receta::create($request->except(''));
        return redirect('recetas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        return view('recetas.recetaShow',compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        return view('recetas.recetaForm',compact('receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        $request->validate([
            'usuario' => ['string','max:255','required'],
            'titulo' => ['string','max:255','required'],
            'descripcion' => ['required'],
            'costo' => ['numeric','required','min:0'],
            'num_personas' => ['numeric','required','min:1','max:1000'],
            'imagen' => ['url','string'],
            'categoria' => ['string', "required","max:255"]
        ]);

        Receta::where('id',$receta->id)->update($request->except('_token','_method'));
        return redirect()->route('recetas.show',[$receta]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        $receta->delete();
        return redirect()->route('recetas.index');

    }
}
