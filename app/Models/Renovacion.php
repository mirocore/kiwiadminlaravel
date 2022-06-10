<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renovacion extends Model
{
    protected $table = "renovaciones";
    protected $primaryKey = "id_renovacion";
    protected $fillable = ['fecha_ultimo_pago', 'notas_renovacion', 'id_hosting' ]; 
    
    
    public function trabajo()
    {    
      return $this->belongsTo(Trabajo::class,'id_trabajo', 'id_trabajo');   
    }
    
    public function hosting() {
      return $this->hasOne(Hosting::class, 'id_hosting', 'id_hosting');
    }
    
    public function dominio() {
      return $this->hasOne(Dominio::class, 'id_dominio', 'id_dominio');
    } 
    
    public function ssl() {
      return $this->hasOne(Ssl::class, 'id_ssl', 'id_ssl');
    }     
    
}
