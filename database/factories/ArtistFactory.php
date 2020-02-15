<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Artist;
use Faker\Generator as Faker;

$factory->define(Artist::class, function (Faker $faker) {
    return [
        'name_en' => $faker->name,
        'name_kr' => $faker->name,
        'description' => $faker->sentence(),
        'twitter' => $faker->userName,
        'facebook' => $faker->userName,
        'youtube' => $faker->userName,
        'instagram' => $faker->userName,
        'spotify_id' => $faker->userName,
        'daum' => $faker->userName,
        'logo' => null,
        'spotify_image' => null,
        'image' => null,
    ];
});
