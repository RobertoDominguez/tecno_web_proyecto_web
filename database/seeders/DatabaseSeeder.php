<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
    }
}

/*

create table Rol(
id serial not null primary key,
nombre varchar(20) not null,
descripcion varchar(200) not null
);

create table Unidad(
id serial not null primary key,
codigo varchar(12) not null unique,
hora_fin time not null,
hora_ini time not null,
nombre varchar(200) not null,
nivel int not null,	
ubicacion varchar(200) not null
);

create table Usuario(
id serial not null primary key,
ci int not null unique,
email varchar(200) not null unique,
password varchar(200) not null,
nombre varchar(120) not null,
ap_materno varchar(120) not null,	
ap_paterno varchar(120) not null,
telefono int,
id_unidad int not null,
	foreign key(id_unidad) references unidad(id) on delete cascade on update cascade,
id_rol int not null,
	foreign key(id_rol) references rol(id) on delete cascade on update cascade
);

create table Estado(
id serial not null primary key,
nombre varchar(20) not null,
descripcion varchar(200) not null
);

create table Documento(
id serial not null primary key,
nombre_interesado varchar(200) not null,
titulo varchar(200) not null,
contenido text not null
);

create table Tarea(
id serial not null primary key,
objetivo varchar(200) not null,
descripcion text not null,
fecha_ingreso date not null,
id_emisor int not null,
	foreign key(id_emisor) references usuario(id) on delete cascade on update cascade,
id_receptor int not null,
	foreign key(id_receptor) references usuario(id) on delete cascade on update cascade,
id_documento int not null,
	foreign key(id_documento) references documento(id) on delete cascade on update cascade,
id_estado int not null,
	foreign key(id_estado) references estado(id) on delete cascade on update cascade,
id_tarea_padre int
);
alter table Tarea add foreign key (id_tarea_padre) references tarea(id) on update no action on delete no action




insert into rol (nombre,descripcion) values('Administrador','Rol de administrador del sistema');
insert into rol (nombre,descripcion) values('Usuario','Rol de usuario del sistema');


insert into unidad (codigo,hora_ini,hora_fin,nombre,nivel,ubicacion) values ('ADM100','00:00','00:00','Administradores',0,'');
insert into unidad (codigo,hora_ini,hora_fin,nombre,nivel,ubicacion) values ('VNT100','00:00','00:00','Ventanilla Unica',4,'Planta baja');
insert into unidad (codigo,hora_ini,hora_fin,nombre,nivel,ubicacion) values ('DCN100','00:00','00:00','Decanatura',1,'Tercer piso');


insert into usuario (ci,email,password,nombre,ap_paterno,ap_materno,telefono,id_rol,id_unidad) values 
(8235543,'roberto@gmail.com','123123123','Roberto Yunior','Dominguez','Molina',78579772,1,1);
insert into usuario (ci,email,password,nombre,ap_paterno,ap_materno,telefono,id_rol,id_unidad) values 
(12345,'jhon@gmail.com','123123123','Jhon','Travolta','Suarez',1235123,2,2);
insert into usuario (ci,email,password,nombre,ap_paterno,ap_materno,telefono,id_rol,id_unidad) values 
(54321,'mario@gmail.com','123123123','Mario','Lopez','Winnipeg',1235123,2,3);


insert into estado (nombre,descripcion) values ('En curso','El documento esta en curso');
insert into estado (nombre,descripcion) values ('Aceptado','El documento ha sido aceptado');
insert into estado (nombre,descripcion) values ('Rechazado','El documento ha sido rechazado');


insert into documento (nombre_interesado,titulo,contenido) values ('Jhon','Test','Prueba de contenido');


insert into tarea (objetivo,descripcion,fecha_ingreso,id_emisor,id_receptor,id_documento,id_estado,id_tarea_padre) 
values ('Recepcion','recepcion de documento','2021-08-06',2,2,1,1,null);

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