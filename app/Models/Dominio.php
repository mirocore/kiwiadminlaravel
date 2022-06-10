<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dominio extends Model
{
    protected $table = "dominios";
    protected $primaryKey = "id_dominio";
    protected $fillable = ['nombre_dominio', 'importe_dominio' ];
}
