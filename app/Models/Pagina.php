<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    use HasFactory;

    protected $table='pagina';
    protected $fillable=[
        'id',
        'url',
        'count'
    ];

    public $timestamps = false;
}

/**
create table pagina(
	id serial not null primary key,
	url varchar(200) not null,
	count int not null
);

insert into pagina (url,count) values('menu',0);
insert into pagina (url,count) values('documento.estado',0);
insert into pagina (url,count) values('documento.ubicacion',0);
insert into pagina (url,count) values('loginView',0);
insert into pagina (url,count) values('administrador.usuario.index',0);
insert into pagina (url,count) values('administrador.usuario.create',0);

insert into pagina (url,count) values('administrador.usuario.edit',0);
insert into pagina (url,count) values('administrador.unidad.index',0);
insert into pagina (url,count) values('administrador.unidad.create',0);
insert into pagina (url,count) values('administrador.unidad.edit',0);
insert into pagina (url,count) values('usuario.documento.index',0);
insert into pagina (url,count) values('usuario.documento.create',0);
insert into pagina (url,count) values('usuario.documento.edit',0);
insert into pagina (url,count) values('usuario.tarea.index',0);
insert into pagina (url,count) values('usuario.tarea.create',0);
insert into pagina (url,count) values('usuario.tarea.edit',0);
insert into pagina (url,count) values('usuario.bifurcacion.index',0);
insert into pagina (url,count) values('usuario.bifurcacion.create',0);
insert into pagina (url,count) values('usuario.bifurcacion.edit',0);
insert into pagina (url,count) values('usuario.union.index',0);
insert into pagina (url,count) values('usuario.reporte.index',0);

*/