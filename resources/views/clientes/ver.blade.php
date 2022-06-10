@extends('layout.main')

@section('title')
    {{$cliente->nombre}}
@endsection

@section('main')

<div class="row mb-4">
    <div class="col">
        <a href="<?=route('clientes.index')?>">Volver al listado</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card py-4 px-4 rounded-0">
            <div class="row">
                <div class="col">
                    <h1 class="h2 border-bottom pb-1 mb-3">Datos Personales</h1>
                </div>
            </div>
            <div class="row mt-3">
                   <div class="col-md-6 info-tit">
                        <span >Nombre</span> 
                        <p class="d-inline">{{$cliente->nombre}}</p>
                   </div>
                   <div class="col-md-6 info-tit">
                        <span >Email</span> 
                        <p class="d-inline">{{$cliente->email}}</p>
                   </div>                                       
            </div>
            <div class="row">
                   <div class="col-md-6 info-tit">
                        <span >Teléfono</span> 
                        <p class="d-inline">{{$cliente->telefono}}</p>
                   </div>                  
                   <div class="col-md-6 info-tit">
                        <span >Fecha de contratación</span>
                        @if($cliente->fecha_contratacion) 
                        <p class="d-inline">{{$cliente->fecha_contratacion}}</p>
                        @else
                        <p class="d-inline font-weight-light">Sin especificar</p>
                        @endif
                   </div>          
            </div>
            @if($cliente->notas_contratacion)
            <div class="row">
                <div class="col info-tit">
                   <span >Notas de contratación</span> 
                    <p class="d-inline">{{$cliente->notas_contratacion}}</p> 
                </div>
            </div>
            @endif
        </div>
    </div>
</div>


@endsection