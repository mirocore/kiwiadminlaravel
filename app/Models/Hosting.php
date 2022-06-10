<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hosting extends Model
{
    protected $table = "hostings";
    protected $primaryKey = "id_hosting";
    protected $fillable = ['nombre_hosting', 'importe_hosting' ];
}
