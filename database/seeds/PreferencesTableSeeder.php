<?php

use Illuminate\Database\Seeder;
use App\Preference;

class PreferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Preference::create([
        	'name'=> 'Tema 1',
        	'navbar' => null,
        	'asidebar' => null
        ]);

        Preference::create([
        	'name'=> 'Tema 2',
        	'navbar' => 'red',
        	'asidebar' => 'black'
        ]);

        Preference::create([
        	'name'=> 'Tema 3',
        	'navbar' => 'black',
        	'asidebar' => null
        ]);

        Preference::create([
            'name'=> 'Tema 4',
            'navbar' => 'green',
            'asidebar' => null
        ]);

        Preference::create([
            'name'=> 'Tema 5',
            'navbar' => 'pink',
            'asidebar' => '#ff00f5a6'
        ]);
    }
}
