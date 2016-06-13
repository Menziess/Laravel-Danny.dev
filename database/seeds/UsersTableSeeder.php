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
			'url'       => 'https://scontent-ams3-1.xx.fbcdn.net/v/t1.0-9/12743555_1008625845860269_2331931867126981355_n.jpg?oh=3142998976dc4cb26beb62ec0481af82&oe=580C9043',
			'type'      => 'image',
			'mime'      => 'jpeg',
			'extension' => 'jpeg',
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
