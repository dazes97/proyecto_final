<?php

use Illuminate\Database\Seeder;
use App\TypeTask;

class TypeTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeTask::create(['name' => 'Trabajo']);
        TypeTask::create(['name' => 'Encargo']);
        TypeTask::create(['name' => 'Analisis']);
        TypeTask::create(['name' => 'Atencion']);
        TypeTask::create(['name' => 'Recepcion']);
    }
}
