<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HorarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return [
          'modalidade' => 'remoto',
          'dia' => $this->faker->date(),
          'inicia' => $this->faker->time(),
          'termina' => $this->faker->time(),
          'local' => $this->faker->address(),
          'material' => $this->faker->url(),
          'agenda' => 'não organizado',
          'observacoes' => $this->faker->paragraph(),
      ];
    }
}
