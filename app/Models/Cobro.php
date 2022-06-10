<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cobro extends Model
{
    protected $table = "cobros";
    protected $primaryKey = "id_cobro";
    protected $fillable = ['id_trabajo', 'fecha_cobro', 'notas_cobro', 'importe_cobro'];
    
    public function trabajos()
    {    
      return $this->belongsTo(Trabajo::class,'id_trabajo', 'id_trabajo');   
    }
    

}
