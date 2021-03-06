<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Ingrediente;
use App\Models\Receta;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas = Receta::with('categoria')->get();
        return view('recetas.recetaIndex',compact('recetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('recetas.recetaForm', compact('categorias'));
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
            'titulo' => ['string','max:255','required'],
            'descripcion' => ['required'],
            'costo' => ['numeric','required','min:0'],
            'num_personas' => ['numeric','required','min:1','max:1000'],
            'imagen' => ['url','string'],
            'categoria_id' => ['required','numeric'],
        ]);

        //dd($request->all());
        $receta = Receta::create($request->all());
        return redirect()->route('recetas.ingredientes',[$receta->id]);
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
        $this->authorize('update',$receta);
        $categorias = Categoria::all();
        return view('recetas.recetaForm',compact('receta','categorias'));
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
        $this->authorize('update',$receta);
        $request->validate([
            'titulo' => ['string','max:255','required'],
            'descripcion' => ['required'],
            'costo' => ['numeric','required','min:0'],
            'num_personas' => ['numeric','required','min:1','max:1000'],
            'imagen' => ['url','string'],
            'categoria_id' => ['required','numeric'],
        ]);

        Receta::where('id',$receta->id)->update($request->except('_token','_method'));
        return redirect()->route('recetas.ingredientes',[$receta->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        $this->authorize('delete',$receta);
        $receta->delete();
        return redirect()->route('recetas.index');

    }

    public function agregarProcesos(Receta $receta)
    {
        return view("recetas.recetaAgregarProcesos",compact('receta'));
    }

    public function ingredientes($id)
    {
        $receta = Receta::find($id);
        return view("recetas.recetaAgregarIngredientes",compact('receta'));
    }

    public function agregarIngrediente(Request $request,Receta $receta)
    {
        $request->validate([
            'nombre' => ['string','max:255','required'],
            'cantidad' => ['string','max:255','required'],
        ]);
        $ingrediente = Ingrediente::firstOrCreate(['nombre' => $request->nombre]);
        $receta->ingredientes()->attach($ingrediente->id,['cantidad' => $request->cantidad]);
        return redirect()->route('recetas.ingredientes',[$receta->id])->with([
            'mensaje' => 'Ingrediente aregado Correctamente',
            'alert-type' => 'alert-info',
        ]);
    }

    public function eliminarIngrediente(Request $request, Receta $receta)
    {
        $receta->ingredientes()->detach($request->only('id'));
        return redirect()->route('recetas.ingredientes',[$receta->id])->with([
            'mensaje' => 'Ingrediente eliminado de la receta',
            'alert-type' => 'alert-info',
        ]);;
    }
}
