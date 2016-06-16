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

		$video1 = App\Resource::create([
			'name'      => 'My video',
			'url'       => '166284984',
			'type'      => 'video',
		]);

		$video2 = App\Resource::create([
			'name'      => 'My video',
			'url'       => '131811521',
			'type'      => 'video',
		]);

		$user = App\User::create([
			'first_name' 	=> 'Stefan',
			'last_name'		=> 'Schenk',
			'email'			=> 'stefan_schenk@hotmail.com',
			'password'		=> bcrypt('test123'),
			'about'			=> $faker->sentence(44),
			'facebook'		=> 'https://www.facebook.com/stefan.schenk.566',
			'google'		=> 'https://plus.google.com/+StefanSchenkMenzies',

			'street'		=> 'Flamingolaan',
			'number'		=> '65',
			'zipcode'		=> '1619 VC',
			'city'			=> 'Andijk',
			'country'		=> 'Netherlands',
		]);

		$video1->user()->associate($user)->save();
		$video2->user()->associate($user)->save();
	}
}
