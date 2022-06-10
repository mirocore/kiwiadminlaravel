<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Trabajo extends Model
{
    
    protected $table = "trabajos";
    protected $primaryKey = "id_trabajo";
    protected $fillable = ['nombre', 'descripcion', 'estado', 'fecha_contratacion', 'fecha_alta', 'id_cliente'];    
    
    public function clientes()
    {    
      return $this->belongsTo(Cliente::class,'id_cliente', 'id_cliente');   
    }
    
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'trabajos_tienen_servicios', 'id_trabajo', 'id_servicio', 'id_trabajo', 'id_servicio');
    }
    

        
    public static $rules = [
        'nombre' => 'required|min:3|max:150',
        'estado' => 'required',
        'fecha_contratacion' => 'required',
    ];
    
    public static $messages = [
        'nombre.required' => 'El campo nombre no puede estar vacío',
        'nombre.min' => 'El mínimo de caracteres es de 3',
        'nombre.max' => 'El máximo de caracteres es de 150',
        'estado.required' => 'Por favor seleccione un estado',
        'id_cliente.required' => 'Por favor seleccione un cliente',    
        'fecha_contratacion.required' => 'Éste campo no puede estar vacío',
        'hosting.required' => 'Por favor seleccione una opción',
        'dominio.required' => 'Por favor seleccione una opción',
        'ssl.required' => 'Por favor seleccione una opción',
    ];    
    
}
