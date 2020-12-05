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
                        Rellena los datos
                    </h3>
                    @if (isset($receta))
                        <form action="{{ route('recetas.update', [$receta]) }}" method="POST">
                            @method('patch')
                    @else
                        <form action="{{route('recetas.store')}}" method="POST">
                    @endif
                        @csrf
                        <div class= "form-group">
                            <label for="titulo" class>Titulo: </label>
                            <input type="text" name="titulo" id="titulo" value="{{old('titulo')?? $receta->titulo ?? ""}}" class="form-control"><br>
                            <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}">
                            <label for="descripcion" class>Descripción: </label><br>
                            <textarea name="descripcion" id="descripcion" cols="30" rows="3" class="form-control">{{old('descripcion')?? $receta->descripcion ?? ""}}</textarea><br>
                            <label for="categoria_id" class>categoria:</label>
                            <select name="categoria_id" id="categoria" class="form-control">
                                @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}"> {{$categoria->nombre}}</option>
                                @endforeach
                            </select>
                            <label for="costo" class>Costo aproximado: </label>
                            <input step="any" type="number" name="costo" id="costo" value="{{old('costo') ?? $receta->costo ?? ""}}" class="form-control"><br>
                            <label for="num_personas" class>Num. de personas: </label>
                            <input type="number" name="num_personas" id="num_personas" value="{{old('num_personas')?? $receta->num_personas ?? ""}}" class="form-control"><br>
                            <label for="imagen" class>Imagen:</label>
                            <input type="url" name="imagen" id="imagen" value="{{old('imagen')?? $receta->imagen ?? ""}}" class="form-control"><br>
                            <div class= "position-relative form-group">
                            <center><button type="submit" class="mt-1 btn btn-primary">Siguiente</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
