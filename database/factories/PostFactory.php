<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'body' => $faker->realText,
        'image_url' => $faker->word,
        'user_id' => $faker->numberBetween($min = 1, $max = 3),
        'category_id' => $faker->numberBetween($min = 1, $max = 7),
        'created_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
