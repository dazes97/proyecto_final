<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call(TypeFileSeeder::class);
        $this->call(TypeStructureSeeder::class);
        $this->call(PreferencesTableSeeder::class);
        /*LLamadas de Daniel*/
        $this->call(SpecialtiesTableSeeder::class);
        $this->call(TypeTaskTableSeeder::class);
    }
}
