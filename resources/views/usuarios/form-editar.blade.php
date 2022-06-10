<?php
use App\Models\Usuario;
use Illuminate\Support\ViewErrorBag;

/** @var ViewErrorBag $errors */
/** @var Usuario $usuario */
?>


@extends ('layout.main')


@section('title')
    Editar Usuario
@endsection

@section('main')

<div class="row mb-4">
    <div class="col">
        <a href="<?=route('usuarios.index')?>">Volver al listado</a>
    </div>
</div>

<div class="row mb-3">
    <div class="col">
       <h1 class="h2">Añadir usuario nuevo</h1> 
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card rounded-0 bg-white py-5 px-5">
            <h2 class="mb-4 h5 font-weight-bold border-bottom pb-1">Datos personales </h2>
            <form action="{{route('usuarios.editar' , ['usuario' => $usuario->id_usuario]) }}" method="post">
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
                                value="{{ old('nombre')  ?? $usuario->nombre }}"
                        >
                        @if($errors->has('nombre'))
                        <div class="mt-2 alert alert-danger border-0 rounded-0 font-weight-light h6"><small>{{$errors->first('nombre')}}</small></div>
                        @endif
                    </div>
                    <div class="col form-group">
                        <label for="apellido" class="sr-only">Apellido</label>
                        <input      
                                type="text" 
                                class="form-control rounded-0" 
                                name="apellido" 
                                id="apellido"
                                placeholder="Apellido"
                                value="{{ old('apellido')  ?? $usuario->apellido }}"
                        >
                        @if($errors->has('apellido'))
                        <div class="mt-2 alert alert-danger border-0 rounded-0 font-weight-light h6"><small>{{$errors->first('apellido')}}</small></div>
                        @endif
                    </div>                    
                </div>
                <div class="form-row mb-3">
                    <div class="col form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input      
                                type="email" 
                                class="form-control rounded-0" 
                                name="email" 
                                id="email"
                                placeholder="Email"
                                value="{{ old('email')  ?? $usuario->email }}"
                        >
                        @if($errors->has('email'))
                        <div class="mt-2 alert alert-danger border-0 rounded-0 font-weight-light h6"><small>{{$errors->first('email')}}</small></div>
                        @endif
                    </div>
                    <div class="col form-group">
                        <label for="password" class="sr-only">Contraseña</label>
                        <input      
                                type="password" 
                                class="form-control rounded-0" 
                                name="password" 
                                id="password"
                                placeholder="Contraseña"
                        >
                        @if($errors->has('password'))
                        <div class="mt-2 alert alert-danger border-0 rounded-0 font-weight-light h6"><small>{{$errors->first('password')}}</small></div>
                        @endif
                    </div>                     
                </div>
                <button class="btn btn-primary btn-block rounded-0">
                    Añadir usuario
                </button>                
            </form>
        </div>
    </div>
</div>


@endsection
