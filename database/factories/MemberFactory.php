<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Artist;
use App\Models\Member;
use App\Models\Subunit;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    return [
        'artist_id' => function () {
            return factory(Artist::class)->create()->id;
        },
        'subunit_id' => function () {
            return factory(Subunit::class)->create()->id;
        },
        'name_en' => $faker->name,
        'name_kr' => $faker->name,
        'stage_name_en' => $faker->name,
        'stage_name_kr' => $faker->name,
        'description' => $faker->sentence(),
        'twitter' => $faker->userName,
        'youtube' => $faker->userName,
        'instagram' => $faker->userName,
        'image' => null,
    ];
});
