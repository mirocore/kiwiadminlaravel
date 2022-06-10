<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";
    protected $primaryKey = "id_cliente";
    protected $fillable = ['nombre', 'email', 'telefono', 'fecha_contratacion', 'notas_contratacion'];

    
    public static $rules = [
        'nombre' => 'required|min:2',
        'apellido' => 'min:2',
        'email' => 'required|email:rfc',
        'telefono' => 'required|numeric',
    ];
        
 
    
    public static $messages = [
        'nombre.required' => 'El campo nombre no puede ir vacío',
        'nombre.min' => 'Debe contener al menos 2 caracteres',       
        'apellido.required' => 'El campo apellido no puede ir vacío',
        'apellido.min' => 'Debe contener al menos 2 caracteres',       
        'email.required' => 'El campo email no puede ir vacío',       
        'email.email' => 'El formato del email no es correcto',                  
        'telefono.required' => 'El campo teléfono no puede ir vacío',       
        'telefono.numeric' => 'El valor ingresado debe ser un número',                  
    ]; 
}
