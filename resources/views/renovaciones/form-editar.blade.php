@extends('layout.main')


@section('title')
Editar Hosting/Dominio
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
                <h2>Cliente</h2>
                @if($cliente)
                <p><span>{{$cliente->nombre}}: </span> {{$cliente->email}}</p>
                @else
                <p>Sin asignar</p>
                @endif
            </div>
            <div class="col">
                <h2>Importe</h2>
                <p>${{$importe}}</p>
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
           FORMULARIO
=========================================-->
<div class="row mb-3 mt-3">
    <div class="col">
        <h1 class="h3">Editar Hosting/Dominio/SSL</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card rounded-0 b-white py-5 px-5">
           <p><small class="text-danger">La fecha de alta del sitio se modifica desde la configuración del trabajo, no de la renovación.</small></p>
            <form action="{{route('renovaciones.editar',['id' =>$trabajo->id_trabajo])}}" method="post">
            @csrf
            @method('PUT')
 <!--==============================
     DATOS DE LA RENOVACION
============================== -->           
 <h2 class="mb-4 h5 font-weight-bold border-bottom pb-1">Datos de la Renovación</h2>               
             <div class="form-row">
                 <div class="form-group col">
                     <label for="fecha_ultimo_pago">Fecha de último pago</label>
                     <input type="date" id="fecha_ultimo_pago" class="form-control" name="fecha_ultimo_pago" value="{{$renovacion->fecha_ultimo_pago}}">
                 </div>
             </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="notas_renovacion">Notas de la renovación</label>
                    <textarea name="notas_renovacion" id="notas_renovacion" cols="30" rows="4" class="form-control" placeholder="Escribir notas...">{{$renovacion->notas_renovacion ? $renovacion->notas_renovacion : ''}}</textarea>
                </div>
            </div>            
<!--==============================
     DATOS DEL HOSTING
============================== -->                                   
  <h2 class="mb-4 mt-4 h5 font-weight-bold border-bottom pb-1">Datos del Hosting</h2>                      
            <div class="form-row">
                <div class="form-group col">
                    <label for="nombre_hosting">Nombre del Hosting</label>
                    <input type="text" class="form-control" id="nombre_hosting" name="hosting[nombre_hosting]" value="{{$renovacion->hosting ? $renovacion->hosting->nombre_hosting : ''}}">
                </div>
                <div class="form-group col">
                    <label for="importe_hosting">Importe del Hosting</label>
                    <input type="text" class="form-control" id="importe_hosting" name="hosting[importe_hosting]" value="{{$renovacion->hosting ? $renovacion->hosting->importe_hosting : ''}}">
                </div>
            </div>
<!--==============================
     DATOS DEL DOMINIO
============================== -->                                                                                  <h2 class="mb-4 mt-4 h5 font-weight-bold border-bottom pb-1">Datos del Dominio</h2>                      
            <div class="form-row">
                <div class="form-group col">
                    <label for="nombre_dominio">Nombre del Dominio</label>
                    <input type="text" class="form-control" id="nombre_dominio" name="dominio[nombre_dominio]" value="{{$renovacion->dominio ? $renovacion->dominio->nombre_dominio : ''}}">
                </div>
                <div class="form-group col">
                    <label for="importe_dominio">Importe del Dominio</label>
                    <input type="text" class="form-control" id="importe_dominio" name="dominio[importe_dominio]" value="{{$renovacion->dominio ? $renovacion->dominio->importe_dominio : ''}}">
                </div>
            </div>
            
<!--==============================
     DATOS DEL SSL
============================== -->
   <h2 class="mb-4 mt-4 h5 font-weight-bold border-bottom pb-1">Datos del SSL</h2>                      
            <div class="form-row">
                <div class="form-group col">
                    <label for="importe_ssl">Importe del SSL</label>
                    <input type="text" class="form-control" id="importe_ssl" name="ssl[importe_ssl]" value="{{$renovacion->ssl ? $renovacion->ssl->importe_ssl : ''}}">
                </div>
            </div>            
<!--==============================
        SUBMIT
============================== -->                             
<div class="form-row">
    <input type="submit" class="btn btn-primary btn-block rounded-0" value="Editar datos">
</div>  
            </form>
        </div>
    </div>
</div>


@endsection