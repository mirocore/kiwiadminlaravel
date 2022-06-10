@extends('layout.main')

@section('title')
    {{$usuario->nombre}} {{$usuario->apellido}}
@endsection

@section('main')

<div class="row mb-4">
    <div class="col">
        <a href="<?=route('usuarios.index')?>">Volver al listado</a>
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
                   <div class="col-md-4 info-tit">
                        <span >Nombre</span> 
                        <p class="d-inline">{{$usuario->nombre}}</p>
                   </div>
                   <div class="col-md-4 info-tit">
                        <span >Apellido</span> 
                        <p class="d-inline">{{$usuario->apellido}}</p>
                   </div>
                   <div class="col-md-4 info-tit">
                        <span >Email</span> 
                        <p class="d-inline">{{$usuario->email}}</p>
                   </div>                                      
            </div>
        </div>
    </div>
</div>


@endsection