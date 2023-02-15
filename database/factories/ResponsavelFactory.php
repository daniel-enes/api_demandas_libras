<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ResponsavelFactory extends Factory
{
  //protected $model = Responsavel::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
      return [
          'nome' => $this->faker->name(),
          'telefone' => $this->faker->numberBetween(11111111111, 99999999999),
          'email' => $this->faker->email(),
          'ocupacao' => 'estudante',
          'cpf' => $this->faker->numberBetween(11111111111, 99999999999),
          'registro' => $this->faker->randomNumber(6, true),
      ];
  }
}
