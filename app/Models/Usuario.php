<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "usuarios";
    protected $primaryKey = "id_usuario";
    protected $fillable = ['email', 'password', 'nombre', 'apellido'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    

    
    public static $rulesCrear = [
        'nombre' => 'required|min:2',
        'apellido' => 'required|min:2',
        'email' => 'required|email:rfc',
        'password' => 'required|min:7',
    ];
    
    public static $rulesEditar = [
        'nombre' => 'required|min:2',
        'apellido' => 'required|min:2',
        'email' => 'required|email:rfc',
    ];
    
    public static $messages = [
        'nombre.required' => 'El campo nombre no puede ir vacío',
        'nombre.min' => 'Debe contener al menos 2 caracteres',       
        'apellido.required' => 'El campo apellido no puede ir vacío',
        'apellido.min' => 'Debe contener al menos 2 caracteres',       
        'email.required' => 'El campo email no puede ir vacío',       
        'email.email' => 'El formato del email no es correcto',       
        'password.required' => 'El campo contraseña no puede ir vacío',       
        'password.min' => 'La contraseña debe tener un mínimo de 7 caracteres',            
    ];     
    
}
