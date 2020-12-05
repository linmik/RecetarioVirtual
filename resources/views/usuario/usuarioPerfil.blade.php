@extends('layouts.Arquitect')

@section('contenido')
    <div class="row">
        <img width="100" class="rounded-circle col-1"  src= {{ asset(Auth::user()->profile_photo_url) }} alt="">
        <h1> {{$user->name}}</h1>
    </div>
    <hr>

    <div class="row">
        @foreach ($user->recetas as $receta)
        <div class="col-md-12 col-lg-8 col-xl-4">
            <div class="card-shadow-primary card-border mb-3 card">
                <div class="dropdown-menu-header">
                    <div class="dropdown-menu-header-inner bg-primary">
                        <div class="menu-header-image">
                            <img src="{{ $receta->imagen}}" alt="">
                            <div class="menu-header-content bg-warning btn-pane-right">
                                <h5 class="menu-header-title text-white">{{$receta->titulo}}</h5>
                                <div class="menu-header-btn-pane">
                                    <button class="mb-2 mr-2 btn-icon-only btn-pill btn btn-outline-danger font-size-xlg">
                                        <i class="pe-7s-like btn-icon-wrapper"></i>
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
@endsection
