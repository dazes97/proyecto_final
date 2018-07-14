<?php

use Illuminate\Database\Seeder;
use App\Specialty;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specialty::create(['name' => "neurologia"]);
        Specialty::create(['name' => "cardiologia"]);
        Specialty::create(['name' => "ginecologia"]);
        Specialty::create(['name' => "dermatologia"]);
        Specialty::create(['name' => "urologia"]);
        Specialty::create(['name' => "traumatologia"]);
        Specialty::create(['name' => "nutricion"]);
        Specialty::create(['name' => "psiquiatria"]);
        Specialty::create(['name' => "medicina general"]);
    }
}
