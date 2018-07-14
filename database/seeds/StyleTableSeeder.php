<?php

use Illuminate\Database\Seeder;
use App\Style;
class StyleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Style::create([
        	'name'=> 'Tema 1',
        	'navbarcolor' => null,
        	'asidecolor' => null
        ]);

        Style::create([
        	'name'=> 'Tema 2',
        	'navbarcolor' => 'red',
        	'asidecolor' => 'black'
        ]);

        Style::create([
        	'name'=> 'Tema 3',
        	'navbarcolor' => 'black',
        	'asidecolor' => null
        ]);

        Style::create([
            'name'=> 'Tema 4',
            'navbarcolor' => 'green',
            'asidecolor' => null
        ]);

        Style::create([
            'name'=> 'Tema 5',
            'navbarcolor' => 'pink',
            'asidecolor' => '#ff00f5a6'
        ]);
    }
}
