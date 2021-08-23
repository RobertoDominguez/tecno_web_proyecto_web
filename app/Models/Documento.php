<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $table='documento';
    protected $fillable=[
        'id',
        'nombre_interesado',
        'titulo',
        'contenido'
    ];

    public $timestamps = false;

    public function scopeTerminados($query){
        return $query;
    }
}
