@extends('layouts.Arquitect')

@section('contenido')
    <center><h1>Recetas</h1></center>
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
                    <h3 class="card-body"><a href="{{isset($receta)? route('recetas.show',[$receta]):route('recetas.index')}}" class="mb-2 mr-2 btn-transition btn btn-outline-primary"><i class="pe-7s-back"></i></a>
                        Ingresa los Procesos
                    </h3>
                    @if (isset($receta))
                        <form action="{{ route('recetas.update', [$receta]) }}" method="POST">
                            @method('patch')
                    @else
                        <form action="{{route('recetas.store')}}" method="POST">
                    @endif
                        @csrf
<div class= "position-relative form-group">
                            <label for="titulo" class>Titulo: </label>
                            <input type="text" name="titulo" id="titulo" value="{{old('titulo')?? $receta->titulo ?? ""}}" class="form-control"><br>
                        </div>
                        <div class= "position-relative form-group">
                            <label for="descripcion" class>Descripción: </label><br>
                            <textarea name="descripcion" id="descripcion" cols="30" rows="3" class="form-control">{{old('descripcion')?? $receta->titulo ?? ""}}</textarea><br>
                        </div>
                        <div class= "position-relative form-group">
                            <label for="categoria" class>categoria:</label>
                            <select name="categoria" id="categoria" class="form-control">
                                @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}"> {{$categoria->nombre}}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>
                       <!-- <div class= "position-relative form-group">
                            <label for="usuario" class>Usuario:</label>
                            <input type="text" name="usuario" id="usuario" value="{{old('usuario')?? $receta->usuario ?? ""}}" class="form-control"><br>
                        </div>-->
                        <div class= "position-relative form-group">
                            <label for="costo" class>Costo aproximado: </label>
                            <input step="any" type="number" name="costo" id="costo" value="{{old('costo') ?? $receta->costo ?? ""}}" class="form-control"><br>
                        </div>
                        <div class= "position-relative form-group">
                            <label for="num_personas" class>Num. de personas: </label>
                            <input type="number" name="num_personas" id="num_personas" value="{{old('num_personas')?? $receta->num_personas ?? ""}}" class="form-control"><br>
                        </div>
                        <div class= "position-relative form-group">
                            <label for="imagen" class>Imagen:</label>
                            <input type="url" name="imagen" id="imagen" value="{{old('imagen')?? $receta->imagen ?? ""}}" class="form-control"><br>
                        </div>
                        <div class= "position-relative form-group">
                            <center><button type="submit" class="mt-1 btn btn-primary">Agregar</button></center>
                        </div>

                    </form>
                    <a href="{{route("recetas.index")}}">Finalizar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
