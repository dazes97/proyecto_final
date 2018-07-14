<?php

use App\Position;
use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create(['name' => 'Administrador',
            'description' => 'master of the system']);

        Position::create(['name' => 'Doctor',
            'description' => 'doctor(a)']);

        Position::create(['name' => 'Laboratorio',
            'description' => 'Encargado(a) de Laboratorio']);
    }
}
