<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


///* Rutas para la cracion de roles */
Route::get('/rol', [App\Http\Controllers\RolController::class, 'index'])->name('rol.index');
Route::post('/rol_create', [App\Http\Controllers\RolController::class, 'store'])->name('rol.store');
Route::get('/rol_show', [App\Http\Controllers\RolController::class, 'show'])->name('rol.show');
Route::get('/rol_edit/{id}', [App\Http\Controllers\RolController::class, 'edit'])->name('rol.edit');
Route::put('/rol_update', [App\Http\Controllers\RolController::class, 'update'])->name('rol.update');

///* Rutas Usuario */
Route::get('usuario_listar_rol', [App\Http\Controllers\UserController::class, 'list_rol'])->name('user.list_rol');
Route::post('/user_create', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/user_show', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::get('/user_edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::get('/user_edit_cuenta/{id}', [App\Http\Controllers\UserController::class, 'edit_cuenta'])->name('user.edit_cuenta');
Route::post('/user_update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::post('/user_update_cuenta', [App\Http\Controllers\UserController::class, 'update_cuenta'])->name('user.update_cuenta');
Route::get('/delete_user/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');