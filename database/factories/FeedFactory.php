<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Feed;
use App\User;
use Faker\Generator as Faker;

$factory->define(Feed::class, function (Faker $faker) {
    return [
        'id'		=> $faker->uuid(),
		'title' 	=> $faker->sentence(),
		'user_id'	=> User::factory()->create()->id,
		'media'     => "p0hpfr0mck9tlewguv2w.jpg",
		'content'	=> $faker->paragraph(),
		'status' 	=> "1"
    ];
});
