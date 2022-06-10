<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('apellido')->get();
        
        return view('usuarios/listado', compact("usuarios"));
    }
    
    public function ver($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios/ver', compact('usuario'));
        
    }
    
    public function formNuevo()
    {
        return view('usuarios/form-nuevo');
    }
    
    public function crear(Request $request)
    {
        // DATOS RECIBIDOS
        $newData = $request->input();
        
        // VALIDACION
        $request->validate(Usuario::$rulesCrear, Usuario::$messages);
        
        // PASSWORD
        $newData['password'] = Hash::make($newData['password']);
        
        // NUEVO REGISTRO
        $usuario = Usuario::create($newData);
        
        // VUELVO AL LISTADO
        return redirect()->route('usuarios.index')->with('success', 'El usuario ' . $usuario->apellido . ' ' . $usuario->nombre . ' ha sido ingresado a la base de datos exitósamente.');
        
    }
    
    public function borrar($id)
    {
        $usuario = Usuario::findOrFail($id);
        
        $usuario->delete();
        
        return redirect()->route('usuarios.index')->with('success', 'El usuario ' . $usuario->apellido . ' ' . $usuario->nombre . ' ha sido eliminado de la base de datos exitósamente.');
    }
    
    public function formEditar(Usuario $usuario)
    {
        return view('usuarios/form-editar', compact('usuario'));
    }
    
    public function editar(Request $request, Usuario $usuario)
    {
        // DATOS RECIBIDOS
        $input = $request->input();
        
        // VALIDACION
        $request->validate(Usuario::$rulesEditar, Usuario::$messages);
        
        // PASSWORD
        if($request->password){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input['password'] = $usuario->password;
        }
        
        // EDITO
        $usuario->update($input);
        
        // VUELVO AL LISTADO
        return redirect()->route('usuarios.index')
            ->with('success', 'Han sido actualizados los datos del usuario ' . $usuario->nombre . " " . $usuario->apellido);
    }
    
    
}
