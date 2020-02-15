<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Album;
use App\Models\Artist;
use App\Models\Subunit;
use Carbon\Carbon;
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
        'description' => $faker->sentence(),
        'spotify_id' => $faker->userName,
        'spotify_image' => null,
        'cover_art' => null,
        'album_image' => null,
        'release_date' => Carbon::now(),
        'version' => null,
        'primary_version' => true,
    ];
});
