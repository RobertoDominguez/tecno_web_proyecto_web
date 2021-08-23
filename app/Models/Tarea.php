<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $table='tarea';
    protected $fillable=[
        'id',
        'objetivo',
        'descripcion',
        'fecha_ingreso',
        'id_tarea_padre',
        'id_documento',
        'id_emisor',
        'id_receptor',
        'id_estado'
    ];

    public $timestamps = false;
}
