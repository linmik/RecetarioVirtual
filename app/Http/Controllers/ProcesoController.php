<?php

namespace App\Http\Controllers;

use App\Models\Proceso;
use Illuminate\Http\Request;

class ProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'receta_id' => ['numeric','required'],
            'titulo' => ['string', 'required', 'max:100'],
            'descripcion' => ['string','required'],
        ]);

        Proceso::create($request->all());
        return redirect()->route('recetas.agregarProcesos',[$request->receta_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function show(Proceso $proceso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function edit(Proceso $proceso)
    {
        return view('procesos.procesoEdit',compact('proceso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proceso $proceso)
    {
        $request->validate([
            'titulo' => ['string', 'required', 'max:100'],
            'descripcion' => ['string','required'],
        ]);
        Proceso::where('id',$proceso->id)->update($request->except('_token','_method'));
        return redirect()->route('recetas.agregarProcesos',[$proceso->receta->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proceso $proceso)
    {
        $receta = $proceso->receta_id;
        $proceso->delete();
        return redirect()->route('recetas.agregarProcesos',[$receta]);
    }
}
