<?php

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
    	App\User::create([
    		'first_name' 	=> 'Stefan',
    		'last_name'		=> 'Schenk',
    		'email'			=> 'stefan_schenk@hotmail.com',
    		'password'		=> bcrypt('test123'),
    		'about'			=> 'The mastermind behind this web app.',
    	]);
    }
}
