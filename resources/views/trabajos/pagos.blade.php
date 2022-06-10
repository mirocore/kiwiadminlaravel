@extends('layout.main')

@section('title')
    Pagos
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
            LISTADO DE PAGOS
=========================================-->
<div class="row mb-3 mt-3">
    <div class="col">
        <h1 class="h3">Listado de pagos</h1>
    </div>
</div>

<div class="row">
    <div class="col">
       <form action="{{route('pagos.editar', ['trabajo' => $trabajo->id_trabajo])}}" method="post">
           @csrf
           @method('PUT')       
       <div id="listaPagos">
 @if(count($pagos) == 0)          
            <div title="0" class="card bg-light rounded-0 px-2 py-4 px-lg-4 pagoIndividual mb-4">
                <!--Empleado Asignado-->
                <div class="form-row mb-3">
                   <div class="col">
                        <label for="id_usuario0">Empleado Asignado</label>
                        <select name="pago[0][id_usuario]" id="id_usuario0" class="form-control">
                            <option value="">Seleccionar empleado</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{$usuario->id_usuario}} ">{{$usuario->nombre}} {{$usuario->apellido}}</option>
                            @endforeach
                        </select>
                   </div>
                </div>
                
                <!--Importe y Fecha-->
                <div class="form-row mb-3">
                    <!--Importe-->
                    <div class="col">
                        <label for="importe_pago0">Importe</label>
                        <input type="text" name="pago[0][importe_pago]" class="form-control" id="importe_pago0">
                    </div>
                    <!--Fecha-->
                    <div class="col">
                        <label for="fecha_pago0">Fecha</label>
                        <input type="date" name="pago[0][fecha_pago]" class="form-control" id="fecha_pago0">
                    </div>                    
                </div>
                
                <!--Notas-->
                <div class="form-row mb-3">
                    <div class="col">
                        <label for="notas_pago0">Notas</label>
                        <textarea name="pago[0][notas_pago]" id="notas_pago0" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col">
                        <label for="estado_pago0">Estado</label>
                        <select name="pago[0][estado_pago]" id="estado_pago0" class="form-control">
                            <option value="no">No pago</option>
                            <option value="si">Pagado</option>
                        </select>
                    </div>
                </div>                
                <i class="fas fa-times btnEliminar" onclick="borrarPago2(this);"></i>
            </div>
@else
    @foreach($pagos as $indice => $pago)
             <div title="{{$indice}}" class="card bg-light rounded-0 px-2 py-4 px-lg-4 pagoIndividual mb-4">
                <!--Empleado Asignado-->
                <div class="form-row mb-3">
                   <div class="col">
                        <label for="id_usuario{{$indice}}">Empleado Asignado</label>
                        <select name="pago[{{$indice}}][id_usuario]" id="id_usuario{{$indice}}" class="form-control">
                            <option value="">Seleccionar empleado</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{$usuario->id_usuario}}" {{$usuario->id_usuario == $pago->id_usuario ? 'selected' : ''}}>{{$usuario->nombre}} {{$usuario->apellido}}</option>
                            @endforeach
                        </select>
                   </div>
                </div>
                
                <!--Importe y Fecha-->
                <div class="form-row mb-3">
                    <!--Importe-->
                    <div class="col">
                        <label for="importe_pago{{$indice}}">Importe</label>
                        <input type="text" name="pago[{{$indice}}][importe_pago]" class="form-control" id="importe_pago{{$indice}}" value="{{$pago->importe_pago}}">
                    </div>
                    <!--Fecha-->
                    <div class="col">
                        <label for="fecha_pago{{$indice}}">Fecha</label>
                        <input type="date" name="pago[{{$indice}}][fecha_pago]" class="form-control" id="fecha_pago{{$indice}}" value="{{$pago->fecha_pago}}">
                    </div>                    
                </div>
                
                <!--Notas-->
                <div class="form-row mb-3">
                    <div class="col">
                        <label for="notas_pago{{$indice}}">Notas</label>
                        <textarea name="pago[{{$indice}}][notas_pago]" id="notas_pago{{$indice}}" cols="30" rows="2" class="form-control">{{$pago->notas_pago}}</textarea>
                    </div>
                </div>
                
                <!--Estado-->
                <div class="form-row mb-3">
                    <div class="col">
                        <label for="estado_pago{{$indice}}">Estado</label>
                        <select name="pago[{{$indice}}][estado_pago]" id="estado_pago[0]" class="form-control" id="estado_pago{{$indice}}">
                            <option value="no" {{$pago->estado_pago == "no" ? 'selected' : ''}}>No pago</option>
                            <option value="si" {{$pago->estado_pago == "si" ? 'selected' : ''}}>Pagado</option>
                        </select>
                    </div>
                </div>                  
                <i class="fas fa-times btnEliminar" onclick="borrarPago2(this);"></i>
            </div>   
    @endforeach            
@endif
 </div>       
 <!--=========================================
                BOTONES
=========================================-->               
                
<div class="form-row mb-4">
    <div class="col">
        <div class="btn btn-dark btn-block border pointer" id="btnAdd">Añadir un pago adicional</div>
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





<script src="<?=url("js/ajax.js");?>"></script>
<script src="<?=url("js/pagos.js");?>"></script>
<script>
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })
</script>

@endsection