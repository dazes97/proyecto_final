<?php

use Illuminate\Database\Seeder;
use App\UserStyle;
class UserStyleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserStyle::create([
        	'user_id' => 1,
        	'style_id'=> 2,        	
        ]);

        UserStyle::create([
        	'user_id' => 2,
        	'style_id'=> 2,        	
        ]);

        UserStyle::create([
        	'user_id' => 3,
        	'style_id'=> 2,        	
        ]);
    }
}
