<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Album;
use App\Models\Artist;
use App\Models\Subunit;
use Faker\Generator as Faker;

$factory->define(Album::class, function (Faker $faker) {
    return [
        'artist_id' => function () {
            return factory(Artist::class)->create()->id;
        },
        'subunit_id' => function () {
            return factory(Subunit::class)->create()->id;
        },
        'name_en' => $faker->name,
        'name_kr' => $faker->name,
        'name_romanized' => $faker->name,
        'description' => $faker->sentence(),
        'spotify_id' => $faker->userName,
        'header_url' => null,
        'icon_url' => null,
        'logo_url' => null,
    ];
});
