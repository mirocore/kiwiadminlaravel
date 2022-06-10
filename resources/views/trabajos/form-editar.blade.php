<?php

use App\Models\Pago;
use App\Models\Cliente;
use App\Models\Usuario;
use App\Models\Trabajo;
use Illuminate\Support\ViewErrorBag;

?>


@extends('layout.main');

@section('title')
Editar Trabajo
@endsection


@section('main')

<div class="row mb-4">
    <div class="col">
        <a href="<?=route('trabajos.index')?>">Volver al listado</a>
    </div>
</div>

<div class="row mb-3">
    <div class="col">
        <h1 class="h3">Editar trabajo</h1>
    </div>
</div>


<div class="row">
    <div class="col">
        <div class="card rounded-0 bg-white py-5 px-5">
           <form action="{{route('trabajos.editar', ['trabajo' => $trabajo->id_trabajo])}}" method="post">
           @csrf
           @method('PUT')
<!--==============================
        DATOS DEL TRABAJO
============================== -->           
            <h2 class="mb-4 h5 font-weight-bold border-bottom pb-1">Datos del trabajo</h2>
            
            <div class="form-row">
               
                <div class="form-group col">
                    <label for="nombre" class="sr-only">Nombre</label>
                    <input type="text" name='nombre' id="nombre" class="form-control rounded-0" placeholder="Nombre del trabajo" value="{{old('nombre') ?? $trabajo->nombre}}" />
                        @if($errors->has('nombre'))
                        <div class="mt-2 alert alert-danger border-0 rounded-0 font-weight-light h6"><small>{{$errors->first('nombre')}}</small></div>
                        @endif
                </div>
                
                <div class="form-group col">
                    <label for="nombre" class="sr-only">Estado</label>
                    <select name="estado" id="estado" class="form-control rounded-0">
                        <option value="">Seleccionar estado</option>
                        <option value="nuevo" {{$trabajo->estado == "nuevo" ? 'selected' : ''}}>Nuevo</option>
                        <option value="asignado" {{$trabajo->estado == "asignado" ? 'selected' : ''}}>Asignado</option>
                        <option {{$trabajo->estado == "terminado" ? 'selected' : ''}}value="terminado">Terminado</option>
                        <option value="pagado" {{$trabajo->estado == "pagado" ? 'selected' : ''}}>Pagado</option>
                        <option value="cancelado" {{$trabajo->estado == "cancelado" ? 'selected' : ''}}>Cancelado</option>
                    </select>
                        @if($errors->has('estado'))
                        <div class="mt-2 alert alert-danger border-0 rounded-0 font-weight-light h6"><small>{{$errors->first('estado')}}</small></div>
                        @endif
                </div>                                           
            </div>
            

            <div class="form-row">
                <div class="col form-group">
                    <label for="fecha_contratacion">Fecha de contratación</label>
                    <input type="date" class="form-control" name="fecha_contratacion" id="fecha_contratacion" value="{{ old('fecha_contratacion') ?? $trabajo->fecha_contratacion}}" />
                        @if($errors->has('fecha_contratacion'))
                        <div class="mt-2 alert alert-danger border-0 rounded-0 font-weight-light h6"><small>{{$errors->first('fecha_contratacion')}}</small></div>
                        @endif                    
                </div>
                <div class="col form-group">
                    <label for="fecha_alta">Fecha de alta</label>
                    <input type="date" class="form-control" name="fecha_alta" id="fecha_alta" value="{{ old('fecha_alta') ?? $trabajo->fecha_alta}}" />
                        @if($errors->has('fecha_alta'))
                        <div class="mt-2 alert alert-danger border-0 rounded-0 font-weight-light h6"><small>{{$errors->first('fecha_alta')}}</small></div>
                        @endif                     
                </div>                
            </div>
            
       
                
            <div class="form-row">
                <div class="col form-group">
                    <label for="descripcion" class="sr-only">Descripción</label>
                    <textarea name="descripcion" id="" cols="30" rows="10" class="form-control rounded-0" placeholder="Descripción">{{old('descripcion') ?? $trabajo->descripcion}}</textarea>
                </div>
            </div>
 
            
                       
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
<!--==============================
        DATOS DEL CLIENTE
============================== -->                                  

<h2 class="mt-4 mb-4 h5 font-weight-bold border-bottom pb-1">Datos del cliente</h2>               
<div class="form-row mb-2">
    <div class="col form-group">
        <label for="id_cliente">Seleccionar cliente de la base de datos</label>
        <select name="id_cliente" id="id_cliente" class="form-control">
            <option value="">Lista de Clientes</option>
            @foreach($clientes as $cliente)
               @if($trabajo->id_cliente == null)
               <option value="{{$cliente->id_cliente}}" >{{$cliente->nombre}}</option>
                @else
                <option value="{{$cliente->id_cliente}}" {{$trabajo->clientes->id_cliente == $cliente->id_cliente ? 'selected' : ''}}>{{$cliente->nombre}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>


<div class="form-row mb-2">
    <p>Ingresar manualmente al nuevo cliente</p>
</div>
       
<div class="form-row mb-2">
   <div class="col form-group">
        <label for="nombre_cliente" class="sr-only">Nombre del cliente</label>
        <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="Nombre del cliente" value="{{ old('nombre_cliente')}}">
        @if($errors->has('nombre_cliente'))
            <div class="mt-2 alert alert-danger border-0 rounded-0 font-weight-light h6"><small>{{$errors->first('nombre_cliente')}}</small></div>
        @endif
   </div>
   <div class="col form-group">
        <label for="email_cliente" class="sr-only">Email del cliente</label>
        <input type="email" class="form-control" id="email_cliente" name="email_cliente" placeholder="Email del cliente" value="{{ old('email_cliente')}}">
        @if($errors->has('email_cliente'))
            <div class="mt-2 alert alert-danger border-0 rounded-0 font-weight-light h6"><small>{{$errors->first('email_cliente')}}</small></div>
        @endif
   </div>               
   <div class="col form-group">
        <label for="telefono_cliente" class="sr-only">Teléfono del cliente</label>
        <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" placeholder="Teléfono del cliente" value="{{ old('telefono_cliente')}}">
        @if($errors->has('telefono_cliente'))
            <div class="mt-2 alert alert-danger border-0 rounded-0 font-weight-light h6"><small>{{$errors->first('telefono_cliente')}}</small></div>
        @endif                    
   </div>              
</div>
       
<div class="form-row mb-2">
    <div class="col form-group">
        <label for="notas_cliente" class="sr-only">Notas</label>
        <textarea name="notas_cliente" id="notas_cliente" cols="30" rows="5" class="form-control" placeholder="Notas..."></textarea>
    </div>
</div>
                                                                                                   
 
 
 
 
 
<!--==============================
        DATOS DEL IMPORTE
============================== --> 

<h2 class="mt-4 mb-4 h5 font-weight-bold border-bottom pb-1">Datos del Importe</h2>
                       
<div class="form-row mb-2">
    <div class="col-12 form-group">
        <label for="servicios">Servicios</label>
        
    <select id="listaServicios" class="js-example-basic-multiple form-control mb-2" name="servicios[]" multiple="multiple">
        @foreach($servicios as $servicio)
            <option title="{{$servicio->precio}}" value="{{$servicio->id_servicio}}" 
            
           @foreach($trabajo->servicios as $contratado)
            {{$servicio->id_servicio == $contratado->id_servicio ? 'selected' : ''}}
            @endforeach
            
            >{{$servicio->nombre}}</option>
        @endforeach
    </select>

    </div>
    <div class="col-12 mb-4">
        <span class="btn btn-secondary rounded-0 d-inline" id="calcularPrecio">Calcular precio sugerido</span>
        <div id="precioSugerido" class="d-inline"></div>
    </div>
</div>                                                                                                                                                                                                     
<div id="contenedorSubtrabajos">
   @if(count($subtrabajos) == 0)
    <div class="form-row mb-2 border py-3 px-3" title="1">
       <div class="col-12">
           <p class="font-weight-bold">Subtrabajo 1</p>
       </div>
        <div class="col-sm-6 mb-1">
            <label for="nombre_subtrabajo">Subtrabajo</label>
            <input type="text" class="form-control" name="subtrabajo[0]['nombre_subtrabajo']" id="nombre_subtrabajo">
        </div>
        <div class="col-sm-6 mb-1">
            <label for="importe_subtrabajo">Importe</label>
            <input type="text" class="form-control" name="subtrabajo[0]['importe_subtrabajo']" id="importe_subtrabajo">
        </div>
    </div>
    @else
        @foreach($subtrabajos as $indice => $sub)
            <div class="form-row mb-2 border py-3 px-3" title="{{$indice + 1}}">
               <div class="col-12">
                   <p class="font-weight-bold">Subtrabajo {{$indice + 1}}</p>
               </div>
                <div class="col-sm-6 mb-1">
                    <label for="nombre_subtrabajo{{$indice}}">Subtrabajo</label>
                    <input type="text" class="form-control" name="subtrabajo[{{$indice}}]['nombre_subtrabajo']" id="nombre_subtrabajo{{$indice}}" value="{{$sub['nombre_subtrabajo']}}">
                </div>
                <div class="col-sm-6 mb-1">
                    <label for="importe_subtrabajo{{$indice}}">Importe</label>
                    <input type="text" class="form-control" name="subtrabajo[{{$indice}}]['importe_subtrabajo']" id="importe_subtrabajo{{$indice}}" value="{{$sub['importe_subtrabajo']}}">
                </div>
                @if($indice > 1)
                <i class="fas fa-times btnCerrarSub"  onclick="borrarSubtrabajo2(this)"></i>
                @endif
            </div>
        @endforeach            
    @endif                        
</div> 
   
<div class="form-row my-3">
    <div class="col">
     <div class="py-3 px-3 border text-center btn-add" id="btn-add-subtrabajo">Agregar Subtrabajo</div>
    </div>
 </div>                                                                                                         
 
 
                                                                                                                                                                                                                                                                               
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           

          
<!--==============================
            SUBMIT
============================== -->                                                                              
          <div class="form-row">
                <input type="submit" class="btn btn-primary btn-block rounded-0" value="Editar Trabajo">
            </div>                                                                           


<!--<script src="<?=url("js/trabajosform.js");?>"></script>-->




<script src="<?=url("js/jquery-3.2.1.min.js");?>"></script>
<script src="<?=url("js/preciosugerido.js");?>"></script>
<script src="<?=url("js/subtrabajos.js");?>"></script>
<script>
$(document).ready(function() {
    $('#listaServicios').select2({
      placeholder: 'Seleccionar trabajos',
      allowClear: true
    });
});  
</script> 

@endsection