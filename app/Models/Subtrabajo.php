<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Subtrabajo extends Model
{
    protected $table = "subtrabajos";
    protected $primaryKey = "id_subtrabajo";
    protected $fillable = ['nombre_subtrabajo', 'importe_subtrabajo', 'id_trabajo'];
}
