<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

    	App\User::create([
    		'first_name' 	=> 'Stefan',
    		'last_name'		=> 'Schenk',
    		'email'			=> 'stefan_schenk@hotmail.com',
    		'password'		=> bcrypt('test123'),
    		'about'			=> $faker->sentence(44),
    	]);
    }
}
