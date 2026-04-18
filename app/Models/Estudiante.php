<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estudiante extends Model
{
    // Permite utilizar factories para el llenado rápido de la tabla con datos falsos
    use HasFactory;

    // Define la tabla a utilizar
    protected $table = 'estudiantes';

    // Define los campos que se van a llenar
    protected $fillable = [
        'id',
        'nombreCompleto',
        'correo',
        'semestre',
        'id_carrera', // Se utiliza la id de alguna carrera para realizar la relación y asignar a los estudiantes
    ];

    // Define la relación con la tabla de carreras
    // En este caso un estudiante solo puede tener una carrera (1--1)
    public function carrera() {
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }
}
