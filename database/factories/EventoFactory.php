<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->words(5, true),
            'sobre' => $this->faker->paragraph(),
            'informacoes' => $this->faker->url(),
        ];
    }
}
