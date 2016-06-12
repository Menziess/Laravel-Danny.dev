<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(App\Role::ROLES as $role) {
        	App\Role::create([
        		'name'			=> $role[0],
        		'description' 	=> $role[1],
         	]);
        }
    }
}
