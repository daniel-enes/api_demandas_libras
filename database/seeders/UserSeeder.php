<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //User::factory()->count(5)->create();
      
      DB::table('users')->insert([
        'name' => 'Daniel Teste',
        'email' => 'teste@teste.com',
        'password' => Hash::make('123456'),
      ],);
    }
}
