<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estudiante;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // En base al modelo y factory de estudiantes, se añaden 10 registros con datos falsos 
        // a la tabla de estudiantes en la base de datos
        Estudiante::factory(10)->create();
    }
}
