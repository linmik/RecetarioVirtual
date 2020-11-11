@extends('layouts.Arquitect')

@section('contenido')
<div class="card-shadow-focus border mb-3 card card-body border-info">
    <div class='card-body'>
        <div class='card-title'>
            <center>
                <h1>{{$receta->titulo}}</h1>
            </center>
        </div>
        <a href="{{route('recetas.index')}}"  class="mb-2 mr-2 btn-transition btn btn-outline-primary"><i class="pe-7s-back"></i></a>
        <a href="{{route('recetas.edit',[$receta])}}" class= "mb-2 mr-2 btn-transition btn btn-outline-primary">Editar info</a>
        <p>Categoria: {{ $receta->categoria}} <br>
        Usuario: {{ $receta->usuario}} <br>
        Numero de personas: {{ $receta->num_personas}} <br>
        Costo aprox: {{$receta->costo}} <br>
        likes {{$receta->likes}} <br>
        Descripcion: {{ $receta->descripcion}} </p>
        <form action="{{route('recetas.destroy',[$receta])}}" method="post">
            @method('DELETE')
            @csrf
            <button class='mb-2 mr-2 btn-transition btn btn-outline-danger'>Eliminar</button>
        </form>
        <center><img src="{{ $receta->imagen}}" alt="imagen receta" onerror="this.src='{{asset('assets/images/image_notfound.jpg')}}';" width="50%"></center>
    </div>
</div>
@endsection
