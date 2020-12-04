@extends('layouts.Arquitect')
@section('contenido')
<center><h2>Procesos de {{$receta->titulo}}</h2></center>
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
        <div class="main-card mb-3 card">
            <div class="card-body">
                {{dd($receta->ingredientes)}}
                @foreach ($receta->ingredientes as $ingrediente)
                    <h6> {{$ingrediente->nombre}}</h6>
                @endforeach
                <form action="{{route('',[$proceso])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class='mb-2 mr-2 btn-transition btn btn-outline-danger'>Eliminar</button>
                </form>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form action="{{route('recetas.agregarIngrediente')}}" method="POST">
                    @csrf
                    <div class= "position-relative form-group">
                        <label for="titulo" class>Ingrediente: </label>
                        <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}" class="form-control"><br>
                    </div>
                    <!--<div class= "position-relative form-group">
                        <input type="hidden" name="receta_id" id="receta_id" value="{{$receta->id}}">
                        <label for="descripcion" class>Descripción: </label><br>
                        <textarea name="descripcion" id="descripcion" cols="30" rows="3" class="form-control">{{old('descripcion')}}</textarea><br>
                    </div>-->
                    <div class= "position-relative form-group">
                        <center><button type="submit" class="mt-1 btn btn-primary">Agregar proceso</button></center>
                    </div>
                </form>
            </div>
        </div>
        <center>
            <div style="height: 30px"></div>
        <a href="{{route('recetas.show',[$receta->id])}}" class="mt-1 btn btn-danger">Finalizar</a>
        </center>
    </div>
</div>
@endsection
