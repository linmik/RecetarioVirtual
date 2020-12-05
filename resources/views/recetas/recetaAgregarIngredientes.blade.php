@extends('layouts.Arquitect')
@section('contenido')
<center><h2>Ingredientes de {{$receta->titulo}}</h2></center>
@if ($errors->any())
<div class="card-shadow-focus border mb-3 card card-body border-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class= "tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        @if ($receta->ingredientes->count() > 0)
        <div class="main-card mb-1 card">
            <div class="card-body">
                <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                    @foreach ($receta->ingredientes as $ingrediente)
                    <div class="vertical-timeline-item dot-primary vertical-timeline-element">
                        <div><span class="vertical-timeline-element-icon bounce-in"></span>
                            <div class="vertical-timeline-element-content bounce-in">
                                <h4 class="timeline-title">  {{$ingrediente->nombre}}:  {{$ingrediente->pivot->cantidad}}</h4>
                                <form action="{{route('recetas.eliminarIngrediente',[$receta,$ingrediente])}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="{{$ingrediente->id}}">
                                    <button class='mb-1 mr-1 btn-transition btn btn-outline-danger'>Eliminar <i class="pe-7s-trash btn-icon-wrapper"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @endif
        </div>
        <div class="main-card mb-1 card">
            <div class="card-body">
                <form action="{{route('recetas.agregarIngrediente',[$receta->id])}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-5">
                            <label for="titulo">Ingrediente: </label>
                            <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre del ingrediente">
                        </div>
                        <div class="form-group col-5">
                            <label for="titulo">Cantidad: </label>
                            <input type="text" name="cantidad" id="cantidad" value="{{old('cantidad')}}" class="form-control"  placeholder="Cantidad necesaria">
                        </div>
                        <div class="col">
                            <label for="titulo"></label>
                            <button type="submit" class="form-control mt-1 btn btn-primary">Agregar</button></center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <center>
            <div style="height: 10px"></div>
        <a href="{{route('recetas.agregarProcesos',[$receta->id])}}" class="mt-1 btn btn-danger">Siguiente</a>
        </center>
    </div>
</div>
@endsection
