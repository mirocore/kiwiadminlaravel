<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        return view('servicios/listado', compact("servicios"));
    }
    
    public function ver($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('servicios/ver', compact('servicio'));
        
    } 
    
    public function formNuevo()
    {
        return view('servicios/form-nuevo');
    }
    
    public function crear(Request $request)
    {
        // DATOS RECIBIDOS
        $newData = $request->input();
        
        // VALIDACION
        $request->validate(Servicio::$rules, Servicio::$messages);
        
        
        // NUEVO REGISTRO
        $servicio = Servicio::create($newData);
        
        // VUELVO AL LISTADO
        return redirect()->route('servicios.index')->with('success', 'El servicio de ' . $servicio->nombre . ' ha sido ingresado a la base de datos exitósamente.');   
    }  
    
    public function borrar($id)
    {
        $servicio = Servicio::findOrFail($id);
        
        $servicio->delete();
        
        return redirect()->route('servicios.index')->with('success', 'El servicio de ' . $servicio->nombre . ' ha sido eliminado de la base de datos exitósamente.');
    }
    
    public function formEditar(Servicio $servicio)
    {
        return view('servicios/form-editar', compact('servicio'));
    }    
    
    public function editar(Request $request, Servicio $servicio)
    {
        // DATOS RECIBIDOS
        $input = $request->input();
        
        // VALIDACION
        $request->validate(Servicio::$rules, Servicio::$messages);

        
        // EDITO
        $servicio->update($input);
        
        // VUELVO AL LISTADO
        return redirect()->route('servicios.index')
            ->with('success', 'Han sido actualizados los datos del servicio de ' . $servicio->nombre );
    }
    
}
