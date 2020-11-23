@extends('layouts.Arquitect')

@section('contenido')
    <center><h1>Recetas</h1></center>
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a  class="nav-link" id="tab-1" href="{{ route('recetas.create') }}" >
                <span><h5>Crear una nueva receta</h5></span>
            </a>
        </li>
    </ul>

    <div class="row">
        @foreach ($recetas as $receta)
            <div class="col-md-4">
                <div class="card-shadow-focus border mb-3 card card-body border-info rounded-lg">
                    <div class="card-body">
                        <h4 class="card-title"><center>{{$receta->titulo}}</center><br>{{$receta->categoria->nombre}}</h4>
                        <h5 class="card-subtitle">Subido por {{$receta->User->name}}</h5>
                        <center><img src="{{ $receta->imagen}}" alt="imagen receta" onerror="this.src='{{asset('assets/images/image_notfound.jpg')}}';" width="100%"></center>
                        <p>{{$receta->descripcion}}</p>
                        <center><a href="{{route('recetas.show',[$receta])}}" class= "mb-2 mr-2 btn-transition btn btn-outline-primary rounded-pill">Ver detalles</a>
                        </center>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


   <!-- <table>
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Categoria</th>
        </tr>
        @foreach ($recetas as $receta)
            <tr>
                <td><a href="{{route('recetas.show',[$receta])}}">{{ $receta->id}}</a></td>
                <td>{{ $receta->titulo }}</td>
                <td>{{ $receta->categoria }}</td>
            </tr>
        @endforeach
    </table> -->
@endsection
