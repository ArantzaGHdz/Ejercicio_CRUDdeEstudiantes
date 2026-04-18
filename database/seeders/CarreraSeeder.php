<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Carrera;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Se añaden manualmentes dos registros fijos a la tabla de carreras en la base de datos
        Carrera::create([
            'nombre' => 'Ingenieria en TICs',
            'descripcion' => 'Disciplina que combina informática, electrónica y telecomunicaciones para diseñar, implementar y gestionar sistemas de información, redes y software',
        ]);

        Carrera::create([
            'nombre' => 'Ingeniería en Semiconductores',
            'descripcion' => 'Disciplina tecnológica enfocada en el diseño, desarrollo, fabricación, empaquetado y prueba de materiales y dispositivos semiconductores',
        ]);
    }
}
