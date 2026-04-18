<?php

namespace Database\Factories;

use App\Models\Estudiante;
use App\Models\Carrera;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Genera datos falsos para llenar la tabla de estudiantes dentro de la base de datos
        // Sirve para hacer pruebas rápidas sin tener que llenar registros manualmente
        return [
            'nombreCompleto' => $this->faker->sentence(),
            'correo' => fake()->unique()->safeEmail(),
            'semestre' => (string) $this->faker->numberBetween(1,9),
            
            // Selecciona un id random de la tabla de carreras para asignarlo a un registro
            'id_carrera' => Carrera::inRandomOrder()->first()->id,
        ];
    }
}
