<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='usuario';
    protected $fillable=[
        'id',
        'ci',
        'email',
        'password',
        'nombre',
        'ap_paterno',
        'ap_materno',
        'telefono',
        'id_rol',
        'id_unidad'
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = false;
}
