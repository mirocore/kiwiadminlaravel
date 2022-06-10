@extends('layout.main')

@section('title')
    Listado de Trabajos
@endsection

@section('main')

<!--ERROR-->
 @if(Session::has('success'))
<div class="row mb-3">
    <div class="col">
       <div class="alert-ok">
            <p>{{Session::get('success')}}</p>  
       </div>
    </div>
</div>
@endif

<!--TITULO-->
 <div class="row mb-4">
    <div class="col">
        <h1 class="d-inline-block h2">Listado de Trabajos</h1> 
        <a  href="<?=route('trabajos.form-nuevo')?>" class="btn btn-success d-inline-block rounded-0 ml-2">Añadir nuevo</a>
    </div>
</div>

<!--TABLITA-->
<div class="row">
    <div class="col">
        <table id="tablita" class="table">
            <thead>
                <th>Nombre</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th>Deuda del cliente</th>
                <th>Contratado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach($trabajos as $trabajo)
                   <tr>
                        <td>
                        @if($trabajo->deuda_empleado == true)
                        <i class="fas fa-exclamation-circle text-danger" data-toggle="tooltip" data-placement="top" title="Deuda impaga con empleados"></i>
                        @endif
                        
                        @if(count($trabajo->renovacion) > 0)
                        <i class="fas fa-server text-info" data-toggle="tooltip" data-placement="top" title="Servicios de Hosting/Dominio/SSL contratados"></i>
                        @endif
                        {{$trabajo->nombre}}</td>
                        
                        @if($trabajo->clientes)
                            <td>{{$trabajo->clientes->nombre}}</td>
                        @else
                            <td>Sin registrar</td>
                        @endif
                        
                        <td class="text-capitalize">{{$trabajo->estado}}</td>
                        
                        @if($trabajo->importe > $trabajo->cobrado)
                        <td class="text-capitalize">${{$trabajo->importe - $trabajo->cobrado}}</td>
                        @else
                        <td>Sin deuda</td>
                        @endif
                        
                        
                        <td>{{$trabajo->fecha_contratacion}}</td>
                        <td class="text-center">
                            <a class="nav-link dropdown-toggle dd" id="dd{{$trabajo->id_trabajo}}" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
                            <ul class="dropdown-menu dropdown-primary text-muted"  aria-labelledby="dd{{$trabajo->id_trabajo}}">
                              <li><a class="dropdown-item text-muted" href="{{route('trabajos.ver', ['id' =>$trabajo->id_trabajo])}}"><i class="fas fa-search mr-1"></i> Ver detalles</a></li>
                              <li><a class="dropdown-item text-muted" href="{{route('trabajos.form-editar', ['id' =>$trabajo->id_trabajo])}}"><i class="fas fa-edit mr-1"></i> Editar datos</a></li>
                              
                           <li class="dropdown-divider"></li>
                           <li><a class="dropdown-item text-muted" href="{{route('trabajos.form-pagos', ['id' =>$trabajo->id_trabajo])}}"><i class="far fa-money-bill-alt"></i> Pago a empleados</a></li>
                           <li><a class="dropdown-item text-muted" href="{{route('trabajos.form-cobros', ['id' =>$trabajo->id_trabajo])}}"><i class="fas fa-cash-register"></i> Cobro a cliente</a></li>
                           <li class="dropdown-divider"></li>
                           
                           
                           @if(count($trabajo->renovacion) > 0)
                           <li><a class="dropdown-item text-muted" href="{{route('renovaciones.form-editar', ['id' =>$trabajo->id_trabajo])}}"><i class="fas fa-server"></i> Editar Hosting/Dominio</a></li>
                           <li class="text-dark"><a href="#" class="dropdown-item"><form action="{{route('renovaciones.borrar', ['id' => $trabajo->id_trabajo])}}" method="post" class="inline d-block mx-0 my-0">
                               @csrf
                               @method('DELETE')
                               <button onclick="return confirm('¿Está seguro que desea borrar los datos de renovación del trabajo {{$trabajo->nombre }}?');" class="btn btn-link sinBtn d-block mx-0 px-0 py-0 px-0 text-muted" ><i class="fas fa-server text-danger mr-2"></i>Eliminar Hosting/Dominio</button>
                           </form></a></li>                          
                           @else
                           <li><a class="dropdown-item text-muted" href="{{route('renovaciones.form-nuevo', ['id' =>$trabajo->id_trabajo])}}"><i class="fas fa-server"></i> Contratar Hosting/Dominio</a></li>
                           @endif
                           
                           <li class="dropdown-divider"></li>
                            <li class="text-dark"><a href="#" class="dropdown-item"><form action="{{route('trabajos.borrar', ['id' => $trabajo->id_trabajo])}}" method="post" class="inline d-block mx-0 my-0">
                               @csrf
                               @method('DELETE')
                               <button onclick="return confirm('¿Está seguro que desea borrar al trabajo {{$trabajo->nombre }}?');" class="btn btn-link sinBtn d-block mx-0 px-0 py-0 px-0 text-muted" ><i class="far fa-trash-alt mr-2"></i>Eliminar Trabajo</button>
                           </form></a></li>
                            </ul>                 
                        </td>
                   </tr>
                @endforeach
            </tbody>
        </table>
        <div class="myPagination mt-1 float-right">    
            {{$trabajos->links()}}
        </div>        
    </div>
</div>


@endsection