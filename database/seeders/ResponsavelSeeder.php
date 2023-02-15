<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Horario;
use App\Models\Responsavel;
use Illuminate\Database\Seeder;

class ResponsavelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Responsavel::factory()->count(10)
      ->has(Evento::factory()->count(3)->has(
        Horario::factory()->count(3)))
      ->create();
      //Responsavel::factory()->count(5)->create();

    }
}
