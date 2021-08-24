<?php


use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\BifurcacionController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\UnionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//cliente
Route::get('/',[SeguimientoController::class,'menu'])->name('menu');
Route::get('/documento/estado/{id}', [SeguimientoController::class, 'estado'])->name('documento.estado');
Route::get('/documento/ubicacion/{id}', [SeguimientoController::class, 'ubicacion'])->name('documento.ubicacion');


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [UsuarioController::class, 'loginView'])->name('loginview');
    Route::post('/login', [UsuarioController::class, 'login'])->name('login');
});
Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout')->middleware('auth');

Route::post('/modo/dia',[UsuarioController::class,'modoDia'])->name('modo.dia');
Route::post('/modo/noche',[UsuarioController::class,'modoNoche'])->name('modo.noche');

//administrador
Route::prefix('administrador')->middleware(['auth','admin'])->group(function () {
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('administrador.usuario.index');
    Route::get('/usuario/crear', [UsuarioController::class, 'create'])->name('administrador.usuario.create');
    Route::post('/usuario/crear', [UsuarioController::class, 'store'])->name('administrador.usuario.store');
    Route::get('/usuario/editar/{usuario}', [UsuarioController::class, 'edit'])->name('administrador.usuario.edit');
    Route::post('/usuario/editar/{usuario}', [UsuarioController::class, 'update'])->name('administrador.usuario.update');
    Route::post('/usuario/eliminar/{usuario}', [UsuarioController::class, 'destroy'])->name('administrador.usuario.destroy');

    Route::get('/unidades', [UnidadController::class, 'index'])->name('administrador.unidad.index');
    Route::get('/unidad/crear', [UnidadController::class, 'create'])->name('administrador.unidad.create');
    Route::post('/unidad/crear', [UnidadController::class, 'store'])->name('administrador.unidad.store');
    Route::get('/unidad/editar/{unidad}', [UnidadController::class, 'edit'])->name('administrador.unidad.edit');
    Route::post('/unidad/editar/{unidad}', [UnidadController::class, 'update'])->name('administrador.unidad.update');
    Route::post('/unidad/eliminar/{unidad}', [UnidadController::class, 'destroy'])->name('administrador.unidad.destroy');

    Route::get('/reportes', [AdministradorController::class, 'reporteView'])->name('administrador.reporte.index');
});

//usuarios
Route::prefix('usuario')->middleware(['auth','user'])->group(function () {
    Route::get('/documentos', [DocumentoController::class, 'index'])->name('usuario.documento.index');
    Route::get('/documento/crear', [DocumentoController::class, 'create'])->name('usuario.documento.create');
    Route::post('/documento/crear', [DocumentoController::class, 'store'])->name('usuario.documento.store');
    Route::get('/documento/editar/{documento}', [DocumentoController::class, 'edit'])->name('usuario.documento.edit');
    Route::post('/documento/editar/{documento}', [DocumentoController::class, 'update'])->name('usuario.documento.update');
    Route::post('/documento/eliminar/{documento}', [DocumentoController::class, 'destroy'])->name('usuario.documento.destroy');

    Route::get('/tareas', [TareaController::class, 'index'])->name('usuario.tarea.index');
    Route::get('/tarea/crear', [TareaController::class, 'create'])->name('usuario.tarea.create');
    Route::post('/tarea/crear', [TareaController::class, 'store'])->name('usuario.tarea.store');
    Route::get('/tarea/editar/{tarea}', [TareaController::class, 'edit'])->name('usuario.tarea.edit');
    Route::post('/tarea/editar/{tarea}', [TareaController::class, 'update'])->name('usuario.tarea.update');
    Route::post('/tarea/eliminar/{tarea}', [TareaController::class, 'destroy'])->name('usuario.tarea.destroy');

    Route::get('/bifurcaciones', [BifurcacionController::class, 'index'])->name('usuario.bifurcacion.index');
    Route::get('/bifurcacion/crear', [BifurcacionController::class, 'create'])->name('usuario.bifurcacion.create');
    Route::post('/bifurcacion/crear', [BifurcacionController::class, 'store'])->name('usuario.bifurcacion.store');
    Route::get('/bifurcacion/editar/{bifurcacion}', [BifurcacionController::class, 'edit'])->name('usuario.bifurcacion.edit');
    Route::post('/bifurcacion/editar/{bifurcacion}', [BifurcacionController::class, 'update'])->name('usuario.bifurcacion.update');
    Route::post('/bifurcacion/eliminar/{bifurcacion}', [BifurcacionController::class, 'destroy'])->name('usuario.bifurcacion.destroy');

    Route::get('/uniones', [UnionController::class, 'getTareas'])->name('usuario.union.index');
    Route::get('/uniones/verificar/{id_tarea}', [UnionController::class, 'verificar'])->name('usuario.union.verificar');
    Route::post('/uniones/realizar', [UnionController::class, 'realizar'])->name('usuario.union.realizar');

    Route::get('/reportes', [ReporteController::class, 'reporteView'])->name('usuario.reporte.index');
});
