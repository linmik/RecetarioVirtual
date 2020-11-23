@extends('layouts.Arquitect')
@section('contenido')
<center><h2>Proceso de {{$proceso->receta->titulo}}</h2></center>
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
                <form action="{{route('procesos.update',[$proceso])}}" method="POST">
                    @method('patch')
                    @csrf
                    <div class= "position-relative form-group">
                        <label for="titulo" class>Titulo: </label>
                        <input type="text" name="titulo" id="titulo" value="{{old('titulo') ?? $proceso->titulo ?? ""}}" class="form-control"><br>
                    </div>
                    <div class= "position-relative form-group">
                        <label for="descripcion" class>Descripción: </label><br>
                        <textarea name="descripcion" id="descripcion" cols="30" rows="3" class="form-control">{{old('descripcion') ?? $proceso->descripcion ?? ""}}</textarea><br>
                    </div>
                    <div class= "position-relative form-group">
                        <center><button type="submit" class="mt-1 btn btn-primary">Guardar cambios</button></center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
