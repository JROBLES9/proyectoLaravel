<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\InscripcionesController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\DocentesController;
use App\Http\Controllers\AulaController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('posts')->group(function () {
    Route::get('/getTodos',[ PostController::class, 'get']);
    Route::post('/',[ PostController::class, 'store']);
    Route::get('/{id}',[ PostController::class, 'show']);
    Route::put('/{id}',[ PostController::class, 'update']);
    Route::put('/desactivar/{id}',[ PostController::class, 'deactivate']);
    Route::put('/activar/{id}',[ PostController::class, 'activate']);
    Route::delete('/{id}',[ PostController::class, 'delete']);
});

Route::prefix('tareas')->group(function (){
    Route::get('/getTodos',[ TareasController::class, 'get']);
    Route::post('/',[ TareasController::class, 'store']);
    Route::get('/{id}',[ TareasController::class, 'show']);
    Route::put('/{id}',[ TareasController::class, 'update']);
    Route::delete('/{id}',[ TareasController::class, 'destroy']);
    Route::put('/cancelada/{id}',[ TareasController::class, 'cancelada']);
    Route::put('/completada/{id}',[ TareasController::class, 'completada']);
    Route::put('/pendiente/{id}',[ TareasController::class, 'pendiente']);
});

Route::prefix('inscripciones')->group(function (){
    Route::get('/getTodos',[ InscripcionesController::class, 'get']);
    Route::post('/{tipo}',[ InscripcionesController::class, 'store']);
    Route::get('/{id}',[ InscripcionesController::class, 'show']);
    Route::put('/{id}',[ InscripcionesController::class, 'update']);
    Route::delete('/{id}',[ InscripcionesController::class, 'delete']);
});

Route::prefix('empleados')->group(function (){
    Route::get('/getTodos',[ EmpleadosController::class, 'get']);
    Route::post('/',[ EmpleadosController::class, 'store']);
    Route::get('/{id}',[ EmpleadosController::class, 'show']);
    Route::put('/{id}',[ EmpleadosController::class, 'update']);
    Route::delete('/{id}',[ EmpleadosController::class, 'delete']);
});

Route::prefix('docentes')->group(function (){
    Route::get('/getTodos',[ DocentesController::class, 'get']);
    Route::post('/',[ DocentesController::class, 'store']);
    Route::get('/{id}',[ DocentesController::class, 'show']);
    Route::put('/{id}',[ DocentesController::class, 'update']);
    Route::put('/desactivar/{id}',[ DocentesController::class, 'deactivate']);
    Route::put('/activar/{id}',[ DocentesController::class, 'activate']);
    Route::delete('/{id}',[ DocentesController::class, 'delete']);
});

Route::prefix('aulas')->group(function (){
    Route::get('/getTodos',[ AulaController::class, 'get']);
    Route::post('/',[ AulaController::class, 'store']);
    Route::get('/{id}',[ AulaController::class, 'show']);
    Route::put('/{id}',[ AulaController::class, 'update']);
    Route::put('/desactivar/{id}',[ AulaController::class, 'deactivate']);
    Route::put('/activar/{id}',[ AulaController::class, 'activate']);
    Route::delete('/{id}',[ AulaController::class, 'delete']);
});

