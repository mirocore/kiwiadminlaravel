<?php

$cobrado = 0;
foreach($cobros as $cobro){
    $cobrado += $cobro->importe_cobro;
}
$deuda = $importe - $cobrado;

?>


@extends('layout.main')

@section('title')
    Cobros
@endsection

@section('main')
<!--=========================================
            VOLVER AL LISTADO
=========================================-->
<div class="row mb-4">
    <div class="col">
        <a href="<?=route('trabajos.index')?>">Volver al listado</a>
    </div>
</div>

<!--=========================================
                    ERROR
=========================================-->
 @if(Session::has('error'))
<div class="row mb-3">
    <div class="col">
       <div class="alert-error">
            <p>{{Session::get('error')}}</p>  
       </div>
    </div>
</div>
@endif


<!--=========================================
    MODAL PARA VER DATOS DEL TRABAJO
=========================================-->
<button type="button" class="btn btn-primary mb-3 rounded-0" data-toggle="modal" data-target="#exampleModal">
  Ver detalles del trabajo
</button>


<div class="modal fade myModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Datos del trabajo</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col">
                <h2>Nombre</h2>
                <p>{{$trabajo->nombre}}</p>
            </div>
            <div class="col">
                <h2>Estado</h2>
                <p class="text-capitalize">{{$trabajo->estado}}</p>
            </div>            
        </div>
        <div class="row">
            <div class="col">
                <h2>Fecha de contratación</h2>
                <p>{{$trabajo->fecha_contratacion}}</p>
            </div>
            <div class="col">
                <h2>Fecha de alta</h2>
                @if($trabajo->fecha_alta == null)
                <p>Sin asignar</p>
                @else
                <p>{{$trabajo->fecha_alta}}</p>
                @endif
            </div>            
        </div>
        <div class="row">
            <div class="col">
                <h2>Importe</h2>
                <p>${{$importe}}</p>
            </div>
            <div class="col">
                <h2>Cantidad cobrada</h2>
                <p>${{$cobrado}}</p>
            </div>                         
        </div>
        <div class="row">
            <div class="col">
                <h2>Cliente</h2>
                @if($cliente)
                <p class="modal-destacado"><span class="font-weight-bold">{{$cliente->nombre}}: </span> {{$cliente->email}}</p>
                @else
                <p>Sin asignar</p>
                @endif
            </div>                     
        </div>
        @if($trabajo->descripcion)
        <div class="row">
            <div class="col">
                <h2>Descripción</h2>
                <p class="modal-destacado">{{$trabajo->descripcion}}</p>
            </div>          
        </div>       
        @endif                  
      </div>
    </div>
  </div>
</div>




<!--=========================================
            LISTADO DE COBROS
=========================================-->
<div class="row mb-1">
    <div class="col">
        <h1 class="h3">Listado de cobros</h1>
        @if($deuda > 0)
        <p class="text-danger mb-4"><span class="font-weight-bold">Deuda pendiente: </span> ${{$deuda}}</p>
        @else
        <p class="text-success mb-4">Trabajo pago</p>
        @endif
    </div>
</div>

<div class="row">
    <div class="col">
        <form action="{{route('cobros.editar', ['trabajo' => $trabajo->id_trabajo])}}" method="post">
            @csrf
            @method('PUT')  
        <div id="listaCobros">
 @if(count($cobros) == 0)            
            <div title="0" class="card bg-light rounded-0 px-2 py-4 px-lg-4 cobroIndividual mb-4">
                <!--Importe y fecha-->
                <div class="form-row mb-3">
                    <!--Importe-->
                    <div class="col">
                        <label for="importe_cobro0">Importe</label>
                        <input type="text" name="cobro[0][importe_cobro]" class="form-control" id="importe_cobro0" required>
                    </div>
                    <!--Fecha-->
                    <div class="col">
                        <label for="fecha_cobro0">Fecha</label>
                        <input type="date" name="cobro[0][fecha_cobro]" class="form-control" id="fecha_cobro0" required>
                    </div>
                </div>
                <!--Notas-->
                <div class="form-row mb-3">
                    <div class="col">
                        <label for="notas_cobro0">Notas</label>
                        <textarea name="cobro[0][notas_cobro]" id="notas_cobro0" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                
                <i class="fas fa-times btnEliminar" onclick="borrarCobro2(this);"></i>                
            </div>     
@else
    @foreach($cobros as $indice => $cobro)            
      <div title="{{$indice}}" class="card bg-light rounded-0 px-2 py-4 px-lg-4 cobroIndividual mb-4">                
                <!--Importe y Fecha-->
                <div class="form-row mb-3">
                    <!--Importe-->
                    <div class="col">
                        <label for="importe_cobro{{$indice}}">Importe</label>
                        <input type="text" name="cobro[{{$indice}}][importe_cobro]" class="form-control" id="importe_cobro{{$indice}}" value="{{$cobro->importe_cobro}}" required>
                    </div>
                    <!--Fecha-->
                    <div class="col">
                        <label for="fecha_cobro{{$indice}}">Fecha</label>
                        <input type="date" name="cobro[{{$indice}}][fecha_cobro]" class="form-control" id="fecha_cobro{{$indice}}" value="{{$cobro->fecha_cobro}}" required>
                    </div>                    
                </div>
                
                <!--Notas-->
                <div class="form-row mb-3">
                    <div class="col">
                        <label for="notas_cobro{{$indice}}">Notas</label>
                        <textarea name="cobro[{{$indice}}][notas_cobro]" id="notas_cobro{{$indice}}" cols="30" rows="2" class="form-control">{{$cobro->notas_cobro}}</textarea>
                    </div>
                </div>
                  
                <i class="fas fa-times btnEliminar" onclick="borrarCobro2(this);"></i>
            </div>                   
    @endforeach            
@endif
 </div>
       
 <!--=========================================
                BOTONES
=========================================-->               
                
<div class="form-row mb-4">
    <div class="col">
        <div class="btn btn-dark btn-block border pointer" id="btnAdd">Añadir un cobro adicional</div>
    </div>
</div>
   
<div class="form-row mb-4">
    <div class="col">
        <button class="btn btn-primary btn-block py-3  pointer">Guardar cambios</button>
    </div>
</div>                                                         
                                                                                                                                                             
        </form>
    </div>
</div>

<script src="<?=url("js/cobros.js");?>"></script>
<script>
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })
</script>
@endsection