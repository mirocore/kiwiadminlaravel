@extends('layout.main')

@section('title')
    Listado de Clientes
@endsection

@section('main')


 @if(Session::has('success'))
<div class="row mb-3">
    <div class="col">
       <div class="alert-ok">
            <p>{{Session::get('success')}}</p>  
       </div>
    </div>
</div>
@endif

   
 <div class="row mb-4">
    <div class="col">
        <h1 class="d-inline-block h2">Listado de Clientes</h1> 
        <a  href="<?=route('clientes.form-nuevo')?>" class="btn btn-success d-inline-block rounded-0 ml-2">Añadir nuevo</a>
    </div>
</div> 

<div class="row">
    <div class="col">
        <table id="tablita" class="table">
            <thead>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td data-titulo="Nombre">{{$cliente->nombre}}</td>
                        <td data-titulo="Email">{{$cliente->email}}</td>
                        <td data-titulo="Teléfono">{{$cliente->telefono}}</td>
                        <td class="acciones d-flex">
                            <!--VER DETALLES-->
                           <a href="{{route('clientes.ver', ['id' =>$cliente->id_cliente])}}" data-toggle="tooltip" data-placement="top" title="Ver más" ><i class="fas fa-search"></i></a>
                           
                           <!--BORRAR-->
                           <form action="{{route('clientes.borrar', ['id' => $cliente->id_cliente])}}" method="post" class="inline mr-1 ml-1">
                               @csrf
                               @method('DELETE')
                               <button onclick="return confirm('¿Está seguro que desea borrar al cliente {{$cliente->nombre }}?');" class="btn btn-link mx-0 my-0 px-0 py-0 sinBtn" data-toggle="tooltip" data-placement="top" title="Borrar"><i class="far fa-trash-alt"></i></button>
                           </form>
                           
                                                      
                            <!--EDITAR-->
                               <a href="{{route('clientes.form-editar', ['id' =>$cliente->id_cliente])}}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>              
@endsection