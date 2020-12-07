@extends('layouts.Arquitect')
@section('contenido')
<center><h2>Procesos de {{$receta->titulo}}</h2></center>
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
                                <div class="row">
                                    <a href="{{route('procesos.edit',[$proceso])}}" class= "mb-2 mr-2 btn-icon-only btn-pill btn btn-outline-info font-size-xlg"> <i class="pe-7s-note btn-icon-wrapper"></i></a>
                                    <form action="{{route('procesos.destroy',[$proceso])}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="mb-2 mr-2 btn-icon-only btn-pill btn btn-outline-danger font-size-xlg">
                                            <i class="pe-7s-trash btn-icon-wrapper"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="main-card mb-1 card">
            <div class="card-body">
                <form action="{{route('procesos.store')}}" method="POST">
                    @csrf
                    <div class= "form-group">
                        <div class="form-row">
                            <label for="titulo" class = "col-1">Titulo: </label>
                            <input type="text" name="titulo" id="titulo" value="{{old('titulo')}}" class="form-control col"><br>
                        </div>
                        <input type="hidden" name="receta_id" id="receta_id" value="{{$receta->id}}">
                        <label for="descripcion" class>Descripción: </label><br>
                        <textarea name="descripcion" id="descripcion" cols="30" rows="3" class="form-control">{{old('descripcion')}}</textarea><br>
                        <center><button type="submit" class="mt-1 btn btn-primary">Agregar proceso</button></center>
                    </div>
                </form>
            </div>
        </div>
        <center>
            <div style="height: 30px"></div>
        <a href="{{route('recetas.show',[$receta->id])}}" class="mt-1 btn btn-danger">Finalizar</a>
        </center>
    </div>
</div>
@endsection
