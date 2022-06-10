<?php
use Illuminate\Support\ViewErrorBag;


/** @var ViewErrorBag $errors */
?>


@extends ('layout.main')


@section('title')
    Editar Cliente
@endsection


@section('main')

<div class="row mb-4">
    <div class="col">
        <a href="<?=route('clientes.index')?>">Volver al listado</a>
    </div>
</div>

<div class="row mb-3">
    <div class="col">
       <h1 class="h3">Editar cliente </h1> 
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card rounded-0 bg-white py-5 px-5">
            <h2 class="mb-4 h5 font-weight-bold border-bottom pb-1">Datos del cliente</h2>
            <form action="{{route('clientes.editar', ['cliente' => $cliente->id_cliente])}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-row mb-3">
                    <div class="col form-group">
                        <label for="nombre" class="sr-only">Nombre</label>
                        <input type="text" class="form-control rounded-0" name="nombre" id="nombre" placeholder="Nombre" value="{{ old('nombre')  ?? $cliente->nombre }}">
                        
                        @if($errors->has('nombre'))
                        <div class="mt-2 alert alert-danger border-0 rounded-0 font-weight-light h6"><small>{{$errors->first('nombre')}}</small></div>
                        @endif                        
                    </div>
                    <div class="col form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" class="form-control rounded-0" name="email" id="email" placeholder="Email" value="{{ old('email')  ?? $cliente->email }}">
                        
                        @if($errors->has('email'))
                        <div class="mt-2 alert alert-danger border-0 rounded-0 font-weight-light h6"><small>{{$errors->first('email')}}</small></div>
                        @endif                         
                    </div>
                    <div class="col form-group">
                        <label for="telefono" class="sr-only">Teléfono</label>
                        <input type="text" class="form-control rounded-0" name="telefono" id="telefono" placeholder="Teléfono" value="{{ old('telefono')  ?? $cliente->telefono }}">
                        
                        @if($errors->has('telefono'))
                        <div class="mt-2 alert alert-danger border-0 rounded-0 font-weight-light h6"><small>{{$errors->first('telefono')}}</small></div>
                        @endif                         
                    </div>                                        
                </div>
                <div class="form-row mb-3">
                    <div class="col form-group">
                        <div class="col form-group">
                            <label for="fecha_contratacion" >Fecha de contratación</label>
                            <input type="date" id="fecha_contratacion" name="fecha_contratacion" class="form-control rounded-0" value="{{ old('fecha_contratacion')  ?? $cliente->fecha_contratacion }}">
                        </div>
                    </div>

                </div>
                   <div class="form-row mb-3">
                       <div class="col form-group">
                           <label for="notas_contratacion" class="sr-only">Notas de Contratación</label>
                           <textarea name="notas_contratacion" id="notas_contratacion" class="form-control" cols="30" rows="10" placeholder="Notas de contratación">{{ old('notas_contratacion')  ?? $cliente->notas_contratacion }}</textarea>
                       </div>
                   </div>
                    <button class="btn btn-primary btn-block rounded-0">
                    Editar cliente
                </button>
                
                
            </form>
        </div>
    </div>
</div>

@endsection