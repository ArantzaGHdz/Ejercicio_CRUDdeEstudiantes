<?php

namespace Database\Factories;

use App\Models\Carrera;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarreraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Genera datos falsos para llenar la tabla de carreras dentro de la base de datos
        // Sirve para hacer pruebas rápidas sin tener que llenar registros manualmente
        return [
            'nombre' => $this->faker->word(),
            'descripcion' => $this->faker->sentence(),
        ];
    }
}
