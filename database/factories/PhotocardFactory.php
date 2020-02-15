<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Album;
use App\Models\Artist;
use App\Models\Photocard;
use Faker\Generator as Faker;

$factory->define(Photocard::class, function (Faker $faker) {
    return [
        'artist_id' => function () {
            return factory(Artist::class)->create()->id;
        },
        'album_id' => function () {
            return factory(Album::class)->create()->id;
        },
        'type' => 1,
        'image' => null,
    ];
});
