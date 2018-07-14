<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Daniel',
            'email' => 'danielzeballos97@gmail.com',
            'password' => bcrypt('123'),
            'lastname' => 'Zeballos Suarez',
            'birthday' => '2018-06-25',
            'phone' => 78066791,
            'ci' => 11350212,
            'client_id' => 1
        ]);

        User::create(['name' => 'Luis Yerko',
            'email' => 'luis@gmail.com',
            'password' => bcrypt('123'),
            'lastname' => 'Laura Tola',
            'birthday' => '2018-06-25',
            'phone' => 79045777,
            'ci' => 123456789,
            'client_id' => 1
        ]);

        User::create([
            'name' => 'Cristian',
            'email' => 'cristian_isnado@gmail.com',
            'password' => bcrypt('123'),
            'lastname' => 'Isnado',
            'birthday' => '2018-06-25',
            'phone' => 78454547,
            'ci' => 123456789,
            'client_id' => 1
        ]);
    }
}
