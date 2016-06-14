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

		$picture = App\Resource::create([
			'name'      => 'My profile pic',
			'url'       => 'test',
			'type'      => 'image',
			'mime'      => 'image/png',
			'extension' => '.png',
		]);

		$video1 = App\Resource::create([
			'name'      => 'My video',
			'url'       => '//player.vimeo.com/video/166284984',
			'type'      => 'video',
		]);

		$video2 = App\Resource::create([
			'name'      => 'My video',
			'url'       => '//player.vimeo.com/video/131811521',
			'type'      => 'video',
		]);

		$user = App\User::create([
			'first_name' 	=> 'Stefan',
			'last_name'		=> 'Schenk',
			'email'			=> 'stefan_schenk@hotmail.com',
			'password'		=> bcrypt('test123'),
			'about'			=> $faker->sentence(44),
		]);

		$user->resource()->associate($picture)->save();
		$picture->user()->associate($user)->save();
		$video1->user()->associate($user)->save();
		$video2->user()->associate($user)->save();
	}
}
