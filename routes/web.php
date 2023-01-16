<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
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

route::get('login',[UsuarioController::class,'login'])->name('login');

route:: post ('valida',[UsuarioController::class,'valida'])->name('valida');
    
route:: get ('menu',[UsuarioController::class,'menu'])->name('menu');
    
route:: get ('salir',[UsuarioController::class,'salir'])->name('salir');

route:: get ('reporte',[UsuarioController::class,'reporte'])->name('reporte');

route:: get ('nuevo',[UsuarioController::class,'nuevo'])->name('nuevo');

route:: post ('guardar',[UsuarioController::class,'guardar'])->name('guardar');

route:: get ('modifica/{idu}',[UsuarioController::class,'modifica'])->name('modifica');

route:: post ('guardacambios',[UsuarioController::class,'guardacambios'])->name('guardacambios');

route:: get ('elimina/{idu}',[UsuarioController::class,'elimina'])->name('elimina');

route:: get ('roles',[UsuarioController::class,'roles'])->name('roles');