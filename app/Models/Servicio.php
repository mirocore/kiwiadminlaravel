<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = "servicios";
    protected $primaryKey = "id_servicio";
    protected $fillable = ['nombre', 'precio', 'descripcion'];


    
    public static $rules = [
        'nombre' => 'required|min:3',
        'precio' => 'required|numeric',
    ];
    
    public static $messages = [
        'nombre.required' => 'El campo nombre no puede ir vacío',
        'nombre.min' => 'Debe contener al menos 3 caracteres',    
        'precio.numeric' => 'El campo precio debe ser un número',      
        'precio.required' => 'El campo precio no puede ir vacío',            
    ];     
    
}
