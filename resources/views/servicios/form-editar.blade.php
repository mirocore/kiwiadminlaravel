<?php
use Illuminate\Support\ViewErrorBag;


/** @var ViewErrorBag $errors */
?>


@extends ('layout.main')


@section('title')
    Editar Servicio
@endsection

@section('main')

<div class="row mb-4">
    <div class="col">
        <a href="<?=route('servicios.index')?>">Volver al listado</a>
    </div>
</div>

<div class="row mb-3">
    <div class="col">
       <h1 class="h3">Editar servicio</h1> 
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card rounded-0 bg-white py-5 px-5">
            <h2 class="mb-4 h5 font-weight-bold border-bottom pb-1">Datos del servicio</h2>
            <form action="{{route('servicios.editar' , ['servicio' => $servicio->id_servicio])}}" method="post">
               @csrf
               @method('PUT')
                <div class="form-row mb-3">
                    <div class="col form-group">
                        <label for="nombre" class="sr-only">Nombre</label>
                        <input      
                                type="text" 
                                class="form-control rounded-0" 
                                name="nombre" 
                                id="nombre"
                                placeholder="Nombre"
                                value="{{ old('nombre') ?? $servicio->nombre }}"
                        >
                        @if($errors->has('nombre'))
                        <div class="mt-2 alert alert-danger border-0 rounded-0 font-weight-light h6"><small>{{$errors->first('nombre')}}</small></div>
                        @endif
                    </div>
                    <div class="col form-group">
                        <label for="precio" class="sr-only">Precio</label>
                        <input      
                                type="text" 
                                class="form-control rounded-0" 
                                name="precio" 
                                id="precio"
                                placeholder="Precio"
                                value="{{ old('precio') ?? $servicio->precio }}"
                        >
                        @if($errors->has('precio'))
                        <div class="mt-2 alert alert-danger border-0 rounded-0 font-weight-light h6"><small>{{$errors->first('precio')}}</small></div>
                        @endif
                    </div>                    
                </div>
                <div class="form-row mb-3">
                    <div class="col form-group">
                        <label for="descripcion" class="sr-only">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control rounded-0" placeholder="Descripción" cols="30" rows="10">{{ old('descripcion') ?? $servicio->descripcion }}</textarea>
                    </div>                     
                </div>
                <button class="btn btn-primary btn-block rounded-0">
                    Editar servicio
                </button>                
            </form>
        </div>
    </div>
</div>
@endsection