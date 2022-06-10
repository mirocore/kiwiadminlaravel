<?php
use App\Models\Producto;
use App\Models\Usuario;
$total = 0;

foreach($subtrabajos as $sub){
    $total += $sub->importe_subtrabajo;
}

$cobrado = 0;

foreach($cobros as $cobro){
    $cobrado += $cobro->importe_cobro;
}

$importeServicios = 0;

    if($renovacion['hosting']){
        $importeServicios += $renovacion->hosting->importe_hosting;
    }

    if($renovacion['dominio']){
        $importeServicios += $renovacion->dominio->importe_dominio;
    }

    if($renovacion['ssl']){
        $importeServicios += $renovacion->ssl->importe_ssl;
    }


?>



@extends('layout.main')


@section('title')
    {{$trabajo->nombre}}
@endsection

@section('main')

<div class="row mb-4">
    <div class="col">
        <a href="<?=route('trabajos.index')?>">Volver al listado</a>
    </div>
</div>


<!--==============================
        DATOS DEL TRABAJO
============================== --> 
<div class="row">
    <div class="col">
        <div class="card py-4 px-4 rounded-0 mb-3">
            <div class="row">
                <div class="col">
                    <h1 class="h4 border-bottom pb-1 mb-3">
                        {{$trabajo->nombre}}
                    </h1>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6 info-tit">
                    <span>Importe</span>
                    <p class="d-inline">${{$total}}</p>
                </div>
                <div class="col-md-6 info-tit">
                    <span>Cantidad cobrada</span>
                    <p class="d-inline">${{$cobrado}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 info-tit">
                    <span>Estado</span>
                    <p class="d-inline text-capitalize">{{$trabajo->estado}}</p>
                </div>
                   <div class="col-md-4 info-tit">
                        <span >Fecha de contratación</span>
                        @if($trabajo->fecha_contratacion) 
                        <p class="d-inline">{{$trabajo->fecha_contratacion}}</p>
                        @else
                        <p class="d-inline font-weight-light">Sin especificar</p>
                        @endif
                   </div>
                   <div class="col-md-4 info-tit">
                        <span >Fecha de alta</span>
                        @if($trabajo->fecha_alta) 
                        <p class="d-inline">{{$trabajo->fecha_alta}}</p>
                        @else
                        <p class="d-inline font-weight-light">Sin especificar</p>
                        @endif
                   </div>                                                                      
            </div>
            
                              
            @if(count($trabajo->servicios) > 0)
            <div class="row mt-1">
               <div class="col info-tit">
                 <span>Servicios</span>
                 <ul class="unstyled list-inline">
                     @foreach($trabajo->servicios as $servicio)
                     <li class="list-inline-item border py-2 px-2 mb-2">{{$servicio->nombre}}</li>
                     @endforeach
                 </ul>  
               </div>
                
            </div>               
            @endif
                     
                                       
            @if($trabajo->descripcion)
            <div class="row">
                    <div class="col info-tit">
                        <span>Descripción</span>
                        <p class="d-inline">{{$trabajo->descripcion}}</p>
                    </div>                    
            </div>
            @endif   
        </div>
    </div>
</div>


<!--==============================
        DATOS DEL CLIENTE
============================== --> 

<div class="row">
    <div class="col">
        <div class="card py-4 px-4 rounded-0 mb-3">
       
             <div class="row">
                <div class="col">
                    <h1 class="h4 border-bottom pb-1 mb-3">
                           Datos del cliente
                    </h1>
                </div>
            </div>
        @if($cliente == false)
        <p>No se ha registrado los datos del cliente</p>
        @else
            <div class="row mt-3">
                <div class="col-md-6 info-tit">
                    <span>Nombre</span>
                    <p class="d-inline">{{$cliente->nombre}}</p>
                </div>
                <div class="col-md-6 info-tit">
                    <span>Email</span>
                    <p class="d-inline text-capitalize">{{$cliente->email}}</p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-6 info-tit">
                    <span>Teléfono</span>
                    <p class="d-inline text-capitalize">{{$cliente->telefono}}</p>
                </div>
                <div class="col-md-6 info-tit">
                    <span>Fecha de contratación</span>
                    <p class="d-inline text-capitalize">{{$cliente->fecha_contratacion}}</p>
                </div>
            </div>
            @if($cliente->notas_contratacion)
            <div class="row mt-1">
                <div class="col-md-4 info-tit">
                    <span>Descripción</span>
                    <p class="d-inline">{{$cliente->notas_contratacion}}</p>
                </div>
            </div>                       
            @endif
            @endif             
        </div>
    </div>
</div>

<!--==============================
        DATOS DEL IMPORTE
============================== --> 

<div class="row">
    <div class="col">
        <div class="card py-4 px-4 rounded-0 mb-3">
           
             <div class="row">
                <div class="col">
                    <h1 class="h4 border-bottom pb-1 mb-3">
                           Datos del importe
                    </h1>
                </div>
            </div>            
              
            <div class="row">
                <div class="col">
                   @if(count($subtrabajos) > 0)
                    <table id="tablita" class="table">
                      <thead>
                       <tr>
                           <th>Subtrabajo</th>
                           <th class="text-center">Importe</th>
                       </tr>
                      </thead>
                       <tbody>
                        @foreach($subtrabajos as $subtrabajo)
                        <tr>
                            <td>{{$subtrabajo->nombre_subtrabajo}}</td>
                            <td class="text-center">${{$subtrabajo->importe_subtrabajo}}</td>
                        </tr>
                        @endforeach
                       </tbody>
                    </table>
                </div>
            </div> 
             
            <div class="row">
                <div class="col">
                    <p class="text-right h5"><span class="font-weight-bold text-success">Importe Total: </span> ${{$total}}</p>
                </div>
            </div>   
                    @else
                    <p>No se ha registrado ningún subtrabajo por lo tanto el importe del trabajo es nulo.</p>
                    @endif
              
        </div>
    </div>
</div>

<!--==============================
    DATOS DE COBROS A CLIENTES
============================== --> 

<div class="row">
    <div class="col">
        <div class="card py-4 px-4 rounded-0 mb-3">
            
            <div class="row">
                <div class="col">
                    <h1 class="h4 border-bottom pb-1 mb-3" >Datos de cobros a clientes</h1>
                </div>
            </div>
            
            <div class="row">
                @if(count($cobros) == 0)
                    <div class="col">
                        <p>No existe registro de ningún cobro</p>
                    </div>
                @else
                @foreach($cobros as $indice => $cobro)
                    <div class="col-12">
                        <div class="card bg-light mb-3 rounded-0">
                             <div class="card-header bg-info text-white rounded-0">
                                    Cobro {{$indice}}
                              </div>
                                  <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span class="font-weight-bold">Importe: </span>${{$cobro->importe_cobro}}</li>
                                    <li class="list-group-item"><span class="font-weight-bold">Fecha: </span>{{$cobro->fecha_cobro}}</li>
                                    @if($cobro->notas_cobro)
                                    <li class="list-group-item"><span class="font-weight-bold">Notas: </span><span class="font-italic">"{{$cobro->notas_cobro}}"</span></li>
                                    @endif
                                  </ul>
                        </div>
                    </div>
                @endforeach    
                @endif
            </div>
            
        </div>
    </div>
</div>

<!--==============================
    DATOS DE PAGOS A EMPLEADOS
============================== --> 

<div class="row">
    <div class="col">
        <div class="card py-4 px-4 rounded-0 mb-3">
            
             <div class="row">
                <div class="col">
                    <h1 class="h4 border-bottom pb-1 mb-3">
                           Datos de pago a empleados
                    </h1>
                </div>
            </div>            
            
            <div class="row">
                    @if(count($pagos) == 0)
                        <div class="col">
                            <p>No existe registro de ningún pago.</p>
                        </div>
                    @else
                        <div class="col-md-12 info-tit">
                            <span>Empleados Asignados</span>
                            <ul>
                               @foreach($empleados as $empleado)
                                <li>{{$empleado->nombre}} {{$empleado->apellido}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-12">
                            @foreach($pagos as $indice => $pago)
                                <div class="card mb-3 rounded-0">
                                  <div class="card-header">
                                    Pago {{$indice + 1}}
                                  </div>
                                  <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span class="font-weight-bold d-inline">Empleado: </span> {{$pago->empleado[0]->nombre}} {{$pago->empleado[0]->apellido}}</li>
                                    @if($pago->importe_pago == null)
                                    <li class="list-group-item"><span class="font-weight-bold d-inline">Sin aclarar importe</li>
                                    @else
                                    <li class="list-group-item"><span class="font-weight-bold d-inline">Importe: </span>${{$pago->importe_pago}}</li>
                                    @endif
                                    <li class="list-group-item"><span class="font-weight-bold d-inline">Fecha: </span>{{$pago->fecha_pago}}</li>
                                    @if($pago->notas_pago)
                                    <li class="list-group-item"><span class="font-weight-bold d-inline">Notas: </span>{{$pago->notas_pago}}</li>
                                    @endif
                                    @if($pago->estado_pago == 'si')
                                        <li class="list-group-item bg-success text-white"><span class="font-weight-bold d-inline">Pagado</li>
                                    @else
                                        <li class="list-group-item bg-danger text-white"><span class="font-weight-bold d-inline">No pago</li>
                                    @endif
                                  </ul>
                                </div>
                            @endforeach
                        </div>
                    @endif
            </div>
            
            
        </div>
    </div>
</div>



<!--==============================
    DATOS DE LA RENOVACION
============================== --> 
@if($renovacion)
<div class="row">
    <div class="col">
        <div class="card py-4 px-4 rounded-0 mb-3">
        
             <div class="row">
                <div class="col">
                    <h1 class="h4 border-bottom pb-1 mb-3">
                           Datos de Hosting/Dominio/SSL
                    </h1>
                </div>
            </div>        
        
          @if($renovacion->fecha_ultimo_pago)
           <div class="row">
                <div class="col info-tit">
                    <span>Fecha del último pago</span>
                    <p class="d-inline">{{$renovacion->fecha_ultimo_pago}}</p>
                </div>
           </div>
           @endif
           
            @if($renovacion->notas_renovacion)
           <div class="row">
                <div class="col info-tit">
                    <span>Notas de la renovacion</span>
                    <p class="d-inline">{{$renovacion->notas_renovacion}}</p>
                </div>
           </div>
           @endif
           
            <div class="row">
                <div class="col">
                    
                    <div class="table-responsive text-nowrap ">

                      <table class="table">
                        <thead class="bg-dark text-white">
                          <tr>
                            <th scope="col">Servicio</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Importe</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if($renovacion['hosting'])
                              <tr>
                                <td class="font-weight-bold">Hosting</td>

                                    @if($renovacion['hosting']['nombre_hosting'])
                                    <td>{{$renovacion['hosting']['nombre_hosting']}}</td>
                                    @else
                                    <td>Sin Asignar</td>
                                    @endif

                                    @if($renovacion['hosting']['importe_hosting'])
                                    <td>${{$renovacion['hosting']['importe_hosting']}}</td>
                                    @else
                                    <td>Sin Asignar</td>
                                    @endif
                              </tr>
                            @endif
                            @if($renovacion['dominio'])
                              <tr>
                                <td class="font-weight-bold">Dominio</td>
                                    @if($renovacion['dominio']['nombre_dominio'])
                                    <td>{{$renovacion['dominio']['nombre_dominio']}}</td>
                                    @else
                                    <td>Sin Asignar</td>
                                    @endif

                                    @if($renovacion['dominio']['importe_dominio'])
                                    <td>${{$renovacion['dominio']['importe_dominio']}}</td>
                                    @else
                                    <td>Sin Asignar</td>
                                    @endif                            
                              </tr>
                            @endif                            
                            @if($renovacion['ssl']['importe_ssl'])
                              <tr>
                                <td class="font-weight-bold" colspan="2">SSL</td>
                                @if($renovacion['ssl']['importe_ssl'] != null)
                                <td>${{$renovacion['ssl']['importe_ssl']}}</td>
                                @else
                                <td>Sin Asignar</td>
                                @endif                             
                              </tr>
                            @endif                             
                        </tbody>
                      </table>
                    <div class="h5 bg-secondary px-2 py-2 text-white text-center font-weight-bold">Importe de Renovación: ${{$importeServicios}}</div>
                    </div>
                </div>
            </div>    
        
        </div>
    </div>
</div>
@endif
@endsection