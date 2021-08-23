<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;

    protected $table='unidad';
    protected $fillable=[
        'id',
        'codigo',
        'hora_ini',
        'hora_fin',
        'nombre',
        'nivel',
        'ubicacion'
    ];

    public $timestamps = false;
}
