@extends('layouts.Arquitect')

@section('contenido')
<div class="card-shadow-primary card-border mb-3 card">
    <div class="dropdown-menu-header">
        <div class="dropdown-menu-header-inner bg-primary">
            <div class="menu-header-image  rm-max-width">
                <img src="{{ $receta->imagen}}" alt="">

                <div class="menu-header-content bg-warning btn-pane-right">
                    <h1 class="menu-header-title  text-white">{{$receta->titulo}}</h1> <br>
                    <div class="menu-header-btn-pane">
                        <div class="row">

                            @can('update',$receta)
                                <a href="{{route('recetas.edit',[$receta])}}" class="mb-2 mr-2 btn-icon-only btn-pill btn btn-outline-light font-size-xlg">
                                    <i class="pe-7s-note btn-icon-wrapper"></i>
                                </a>
                            @endcan
                            @can('delete',$receta)
                                <form action="{{route('recetas.destroy',[$receta])}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="mb-2 mr-2 btn-icon-only btn-pill btn btn-outline-dark font-size-xlg">
                                        <i class="pe-7s-trash btn-icon-wrapper"></i>
                                    </button>
                                </form>
                            @endcan

                            <a href="{{route('recetas.index')}}" class="mb-2 mr-2 btn-icon-only btn-pill btn btn-outline-info font-size-xlg">
                                <i class="pe-7s-back-2 btn-icon-wrapper"></i>
                            </a>
                            <button class="mb-2 mr-2 btn-icon-only btn-pill btn btn-outline-primary font-size-xlg">
                                <i class="pe-7s-share btn-icon-wrapper"></i>
                            </button>
                            <button class=" mb-2 mr-3 btn-icon-only btn-pill btn btn-outline-danger font-size-xlg font">
                                <i class="pe-7s-like btn-icon-wrapper"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='card-body' >

        {{ $receta->descripcion}} </p>

        Creado por: {{ $receta->User->name}}  <br>
        Categoria: {{ $receta->categoria->nombre}} <br>
        Numero de personas: {{ $receta->num_personas}} <br>
        Costo aprox: {{$receta->costo}} <br>
        likes {{$receta->likes}} <br><br>


    <h4>Ingredientes</h4>
    <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
        @foreach ($receta->ingredientes as $ingrediente)
        <div class="vertical-timeline-item dot-primary vertical-timeline-element">
            <div><span class="vertical-timeline-element-icon bounce-in"></span>
                <div class="vertical-timeline-element-content bounce-in">
                    <h4 class="timeline-title"> {{$ingrediente->pivot->cantidad}} {{$ingrediente->nombre}} </h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <h4>Proceso</h4>
    <div class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
        @foreach ($receta->procesos as $proceso)
        <div class="vertical-timeline-item vertical-timeline-element">
            <div>
                <span class="vertical-timeline-element-icon bounce-in">
                    <i class="badge badge-dot badge-dot-xl badge-success"> </i>
                </span>
                <div class="vertical-timeline-element-content bounce-in">
                    <h4 class="timeline-title"> {{$proceso->titulo}} </h4>
                    <p>{{$proceso->descripcion}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
@endsection
