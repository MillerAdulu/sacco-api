<?php

use Faker\Generator as Faker;

$factory->define(App\County::class, function (Faker $faker) {
    return [
        'county_code' => $faker->unique()->stateAbbr,
        'county_name' => $faker->word
    ];
});
