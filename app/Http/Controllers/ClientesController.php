<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Trabajo;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes/listado', compact("clientes"));
    }
    
    public function ver($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes/ver', compact('cliente'));
        
    } 
    
    public function formNuevo()
    {
        return view('clientes/form-nuevo');
    }
    
    public function crear(Request $request)
    {
        // DATOS RECIBIDOS
        $newData = $request->input();
        
        // VALIDACION
        $request->validate(Cliente::$rules, Cliente::$messages);
        
        // NUEVO REGISTRO
        $cliente = Cliente::create($newData);
        
        // VUELVO AL LISTADO
        return redirect()->route('clientes.index')->with('success', 'El cliente ' . $cliente->nombre . ' ha sido ingresado a la base de datos exitósamente.');
    }
    
    public function borrar($id)
    {
        $cliente = Cliente::findOrFail($id);
        $trabajos = Trabajo::where('id_cliente', '=' , $id)->get();
        if(sizeOf($trabajos) == 0 ){
            $cliente->delete();
            return redirect()->route('clientes.index')->with('success', 'El cliente ' . $cliente->nombre . ' ha sido eliminado de la base de datos exitósamente.');
        }else{
            foreach($trabajos as $trabajo){
                $trabajo->id_cliente = null;
                $trabajo->save();
            }
            $cliente->delete();
            return redirect()->route('clientes.index')->with('success', 'El cliente ' . $cliente->nombre . ' ha sido eliminado de la base de datos exitósamente.');
        }
        
//            $cliente->delete();
//            return redirect()->route('clientes.index')->with('success', 'El cliente ' . $cliente->nombre . ' ha sido eliminado de la base de datos exitósamente.');
        
        
        
    } 
    
    public function formEditar(Cliente $cliente)
    {
        return view('clientes/form-editar', compact('cliente'));
    }
    
    public function editar(Request $request, Cliente $cliente)
    {
        // DATOS RECIBIDOS
        $input = $request->input();
        
        // VALIDACION
        $request->validate(Cliente::$rules, Cliente::$messages);
        
        
        // EDITO
        $cliente->update($input);
        
        // VUELVO AL LISTADO
        return redirect()->route('clientes.index')
            ->with('success', 'Han sido actualizados los datos del cliente ' . $cliente->nombre );
    }    
}
