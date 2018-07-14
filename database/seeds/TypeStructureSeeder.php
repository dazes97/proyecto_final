<?php

use Illuminate\Database\Seeder;
use App\TypeStructure;
class TypeStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeStructure::create([
        	'name' => 'Historial Clinico'
        ]);
        TypeStructure::create([
        	'name' => 'Laboratorio'
        ]);
        TypeStructure::create([
        	'name' => 'Recetas'
        ]);
        TypeStructure::create([
        	'name' => 'Consultas'
        ]);
        TypeStructure::create([
            'name' => 'Operaciones'
        ]);
        TypeStructure::create([
            'name' => 'Control Medico'
        ]);
        TypeStructure::create([
            'name' => 'Otros'
        ]);
    }
}
