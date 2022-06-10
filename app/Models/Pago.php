<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = "pagos";
    protected $primaryKey = "id_pago";
    protected $fillable = ['id_trabajo', 'id_usuario', 'importe_pago', 'fecha_pago', 'notas_pago', 'estado_pago' ];    
}
