<?php

namespace Database\Factories;

use App\Models\Materia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contenido>
 */
class ContenidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [
            'materia_id' => Materia::inRandomOrder()->first()->id,
            'nombre' => $faker->word,
            'titulo' => $faker->sentence,
            'notas' => $faker->paragraph,
            'autor' => $faker->name,
            'oficial' => $faker->boolean,
            'especial' => $faker->boolean,
            'calificacion' => $faker->numberBetween(1, 5),
        ];
    }
}
