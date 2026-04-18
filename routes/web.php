<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CarreraController;
use App\Models\Carreras;

// Rutas para la página principal con la tabla de estudiantes y las vistas de cada operación
// como nuevo estudiante, editar estudiante, datos del estudiante y eliminar estudiante.
Route::get('/', [IndexController::class, 'index'])->name('index');
// Route::get('/test', [IndexController::class, 'create'])->name('test');
Route::get('/estudiantes/{id}', [IndexController::class, 'details'])->name('estudiantes.details');
Route::get('/create', [IndexController::class, 'create'])->name('estudiantes.create');
Route::post('/estudiantes', [IndexController::class, 'store'])->name('estudiantes.store');
Route::get('/estudiantes/{id}/edit', [IndexController::class, 'edit'])->name('estudiantes.edit');
Route::put('/estudiantes/{id}', [IndexController::class, 'update'])->name('estudiantes.update');
Route::delete('/estudiantes/{id}', [IndexController::class, 'delete'])->name('estudiantes.delete');

// Rutas para el apartado de carreras con la tabla de carreras y las vistas de cada operación
// como nueva carrera, editar carrera, datos de la carrera y eliminar carrera.
Route::get('/carreras', [CarreraController::class, 'index'])->name('carreras.index');
Route::get('/carreras/create', [CarreraController::class, 'create'])->name('carreras.create');
Route::post('/carreras', [CarreraController::class, 'store'])->name('carreras.store');
Route::get('/carreras/{id}', [CarreraController::class, 'details'])->name('carreras.details');
Route::get('/carreras/{id}/edit', [CarreraController::class, 'edit'])->name('carreras.edit');
Route::put('/carreras/{id}', [CarreraController::class, 'update'])->name('carreras.update');
Route::delete('/carreras/{id}', [CarreraController::class, 'delete'])->name('carreras.delete');

