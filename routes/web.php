<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Rutas Web
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar rutas web para tu aplicación. Estas
| rutas son cargadas por RouteServiceProvider y todas ellas se asignarán al
| grupo de middleware "web". ¡Haz algo grandioso!
|
*/

// Obtener la vista de bienvenida
Route::get('/', function () {
    return view('/welcome');
});

// Ruta de autenticación
Auth::routes();

// Ruta para la página de inicio
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ruta para mostrar todas las tareas
Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('index');

// Ruta para la creación de una nueva tarea
Route::get('/tasks/create', [App\Http\Controllers\TaskController::class, 'create'])->name('task.create');

// Ruta para guardar una nueva tarea
Route::post('/tasks', [App\Http\Controllers\TaskController::class, 'store'])->name('task.store');

// Ruta para editar una tarea existente
Route::get('/tasks/{id}/edit', [App\Http\Controllers\TaskController::class, 'edit'])->name('task.edit');

// Ruta para actualizar una tarea existente
Route::put('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('task.update');

// Ruta para eliminar una tarea existente
Route::delete('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('task.delete');

// Ruta para mostrar todas las tareas (otra vez, podría ser un duplicado)
Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks');
