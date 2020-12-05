@extends('layouts.Arquitect')
@section('contenido')
    <center><h2>Administrar categorias</h2></center>

    @foreach ($categorias as $categoria)
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form action="{{route('categorias.update',[$categoria])}}" method="post">
                @method('patch')
                @csrf
                <div class= "position-relative form-group">
                    <label for="nombre" class>Nombre: </label>
                    <input type="text" name="nombre" id="nombre" value="{{$categoria->nombre ?? ""}}" class="form-control"><br>
                </div>
                <button class='mb-2 mr-2 btn-transition btn btn-outline-info'>Actualizar</button>
            </form>
        </div>
    </div>
    @endforeach
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form action="{{route('categorias.store')}}" method="POST">
                @csrf
                <div class= "position-relative form-group">
                    <label for="nombre" class>Nombre: </label>
                    <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}" class="form-control"><br>
                </div>
                <div class= "position-relative form-group">
                    <center><button type="submit" class="mt-1 btn btn-primary">Agregar categoria</button></center>
                </div>
            </form>
        </div>
    </div>
@endsection
