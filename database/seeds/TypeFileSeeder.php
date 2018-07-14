<?php

use Illuminate\Database\Seeder;
use App\TypeFile;
class TypeFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	TypeFile::create([
        	'name' => 'pdf'
        ]);
        TypeFile::create([
        	'name' => 'word'
        ]);
        TypeFile::create([
        	'name' => 'excel'
        ]);
        TypeFile::create([
        	'name' => 'image'
        ]);
        TypeFile::create([
            'name' => 'powerpoint'
        ]);
    }
}
