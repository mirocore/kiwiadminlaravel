@extends('layout.main')

@section('title')
    {{$servicio->nombre}}
@endsection

@section('main')

<div class="row mb-4">
    <div class="col">
        <a href="<?=route('servicios.index')?>">Volver al listado</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card py-4 px-4 rounded-0">
            <div class="row">
                <div class="col">
                    <h1 class="h2 border-bottom pb-1 mb-3">Datos del servicio</h1>
                </div>
            </div>
            <div class="row mt-3">
                   <div class="col-md-6 info-tit">
                        <span >Nombre</span> 
                        <p class="d-inline">{{$servicio->nombre}}</p>
                   </div>
                   <div class="col-md-6 info-tit">
                        <span >Precio</span> 
                        <p class="d-inline">${{$servicio->precio}}</p>
                   </div>                                     
            </div>
            @if($servicio->descripcion)
            <div class="row">
                <div class="col info-tit">
                    <span >Descripción</span> 
                        <p class="d-inline font-weight-light">{{$servicio->descripcion}}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection