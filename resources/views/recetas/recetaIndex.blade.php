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
        @php
            $array = [['dark','light'], ['warning','danger'], ['danger','warning']];
        @endphp
        @foreach ($recetas as $receta)
        @php
            $random = Arr::random($array);
        @endphp
        <div class="col-md-12 col-lg-8 col-xl-4">
            <div class="card-shadow-primary card-border mb-3 card">
                <div class="dropdown-menu-header">
                    <div class="dropdown-menu-header-inner bg-primary">
                        <div class="menu-header-image">
                            <img src="{{ $receta->imagen}}" alt="">
                            <div class="menu-header-content bg-{{$random[0]}} btn-pane-right">
                                <h5 class="menu-header-title text-white">{{$receta->titulo}}</h5>
                                <div class="menu-header-btn-pane">
                                    <button class="mb-2 mr-2 btn-icon-only btn-pill btn btn-outline-{{$random[1]}}  font-size-xlg">
                                        <i class="pe-7s-like btn-icon-wrapper "></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p> <b>Categoria: </b> {{$receta->categoria->nombre}}</p>
                    <p class="mb-0 ">{{$receta->descripcion}}
                    </p>
                </div>
                <div class="text-center d-block card-footer">
                    <a href="{{route('recetas.show',[$receta])}}" class="border-0 btn-transition btn btn-outline-info">Ver mas</a>
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
