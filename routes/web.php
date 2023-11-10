<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Obtener Vista de Bienvenida 
Route::get('/', function () {
    return view('/welcome');
});

//Ruta de Autentiacion
Auth::routes();
//Ruta Inicio
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Ruta Index de Tarea
Route::get('/tasks', [App\Http\Controllers\TaskController::class,'index'])->name('index');

//Ruta Crear Tarea
Route::get('/tasks/create', [App\Http\Controllers\TaskController::class, 'create'])->name('task.create');
//Ruta Guardar Tarea
Route::post('/tasks', [App\Http\Controllers\TaskController::class,'store'])->name('task.store');

//Ruta Editar Tarea
Route::get('/tasks/{id}/edit', [App\Http\Controllers\TaskController::class,'edit'])->name('task.edit');
//Ruta Actualizar Tarea
Route::put('/tasks/{id}', [App\Http\Controllers\TaskController::class,'update'])->name('task.update');
//Ruta Eliminar Tarea
Route::delete('/tasks/{id}', [App\Http\Controllers\TaskController::class,'destroy'])->name('task.delete');
//Ruta Mostrar Tareas
Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks');
//Ruta Actualizar Tarea checkbox (En progreso)
Route::post('/tasks/{task}/update-completed', 'TaskController@updateCompleted');


