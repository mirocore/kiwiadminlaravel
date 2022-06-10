

@extends('layout.main')

@section('title')
    Listado de Usuarios
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
        <h1 class="d-inline-block h2">Listado de Usuarios</h1> 
        <a  href="<?=route('usuarios.form-nuevo')?>" class="btn btn-success d-inline-block rounded-0 ml-2">Añadir nuevo</a>
    </div>
</div>



<div class="row">
    <div class="col">
<table id="tablita" class="table" >
    
    <thead>
        <th>Apellido</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Acciones</th>
    </thead>
    
    <tbody>
      @foreach($usuarios as $usuario)
       <tr>
            <td data-titulo="Apellido">{{$usuario->apellido}}</td>
           <td data-titulo="Nombre">{{$usuario->nombre}}</td>
            <td data-titulo="Email">{{$usuario->email}}</td>
            <td class="acciones d-flex">
              <!--VER DETALLES-->
               <a href="{{route('usuarios.ver', ['id' =>$usuario->id_usuario])}}" data-toggle="tooltip" data-placement="top" title="Ver más" ><i class="fas fa-search"></i></a>
                
               <!--BORRAR-->
               <form action="{{route('usuarios.borrar', ['id' => $usuario->id_usuario])}}" method="post" class="inline mr-1 ml-1">
                   @csrf
                   @method('DELETE')
                   <button onclick="return confirm('¿Está seguro que desea borrar al usuario {{$usuario->nombre . " " . $usuario->apellido}}?');" class="btn btn-link mx-0 my-0 px-0 py-0 sinBtn" data-toggle="tooltip" data-placement="top" title="Borrar"><i class="far fa-trash-alt"></i></button>
               </form>

               
               <!--EDITAR-->
               <a href="{{route('usuarios.form-editar', ['id' =>$usuario->id_usuario])}}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a> 
            </td>
        </tr>
        @endforeach                
    </tbody>
    
</table>
    </div>
</div>

@endsection