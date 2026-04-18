<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Se mandan a llamar los seeders de carrera y estudiantes para poblar las respectivas tablas
        // en la base de datos
        $this->call([
            CarreraSeeder::class,
            EstudianteSeeder::class,
        ]);
    }
}
