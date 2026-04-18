<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carrera extends Model
{
    // Permite utilizar factories para el llenado rápido de la tabla con datos falsos
    use HasFactory;

    // Define la tabla a utilizar
    protected $table = 'carreras';

    // Define los campos que se van a llenar
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
    ];

    // Define la relación con la tabla de estudiantes
    // En este caso una carrera puede tener varios estudiantes (1--n)
    public function estudiantes() {
        return $this->hasMany(Estudiante::class);
    }
}
