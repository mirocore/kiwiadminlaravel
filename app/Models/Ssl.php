<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ssl extends Model
{
    protected $table = "ssl";
    protected $primaryKey = "id_ssl";
    protected $fillable = ['importe_ssl'];
}
