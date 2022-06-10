@extends('layout.main')

@section('title')
    Listado de Servicios
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
        <h1 class="d-inline-block h2">Listado de Servicios</h1> 
        <a  href="<?=route('servicios.form-nuevo')?>" class="btn btn-success d-inline-block rounded-0 ml-2">Añadir nuevo</a>
    </div>
</div>

<div class="row">
    <div class="col">
<table id="tablita" class="table" >
    
    <thead>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Acciones</th>
    </thead>
    
    <tbody>
        @foreach($servicios as $servicio)
        <tr>
            <td data-titulo="Nombre">{{$servicio->nombre}}</td>
            <td data-titulo="Precio">${{$servicio->precio}}</td>
            <td class="acciones d-flex">
                <!--VER DETALLES-->
               <a href="{{route('servicios.ver', ['id' =>$servicio->id_servicio])}}" data-toggle="tooltip" data-placement="top" title="Ver más" ><i class="fas fa-search"></i></a>
               
               <!--BORRAR-->
               <form action="{{route('servicios.borrar', ['id' => $servicio->id_servicio])}}" method="post" class="inline mr-1 ml-1">
                   @csrf
                   @method('DELETE')
                   <button onclick="return confirm('¿Está seguro que desea borrar el servicio de {{$servicio->nombre}}?');" class="btn btn-link mx-0 my-0 px-0 py-0 sinBtn" data-toggle="tooltip" data-placement="top" title="Borrar"><i class="far fa-trash-alt"></i></button>
               </form>
                              
                <!--EDITAR-->
               <a href="{{route('servicios.form-editar', ['id' =>$servicio->id_servicio])}}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>              

                              
            </td>
        </tr>        
        @endforeach
    </tbody>

@endsection