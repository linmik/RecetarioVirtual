@extends('layouts.Arquitect')
@section('contenido')
    <center><h2>Administrar categorias</h2></center>
    @if ($errors->any())
    <div class="card-shadow-focus border mb-3 card card-body border-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="main-card mb-3 card">
        <div class="card-body">
            @foreach ($categorias as $categoria)
            <form action="{{route('categorias.update',[$categoria])}}" method="post">
                @method('patch')
                @csrf
                <div class="form-inline">
                    <label for="nombre" class>Nombre: </label>
                    <input type="text" name="nombre" id="nombre" value="{{$categoria->nombre ?? ""}}" class="form-control  mx-sm-2 mb-1"><br>
                    <button class='mb-2 mr-2 btn-transition btn btn-outline-info'>Actualizar</button>
                </div>
            </form>
            <hr>
            @endforeach
            <form action="{{route('categorias.store')}}" method="POST">
                @csrf
                <div class= "form-inline">
                    <label for="nombre" class>Nombre: </label>
                    <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}" class="form-control mx-sm-2 mb-1"><br>
                    <button type="submit" class="mt-1 btn btn-primary">Agregar categoria</button>
                </div>
            </form>
        </div>
@endsection
