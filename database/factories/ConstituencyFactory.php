<?php

use App\County;
use Faker\Generator as Faker;

$factory->define(App\Constituency::class, function (Faker $faker) {

    $counties = County::all()->pluck('county_id')->toArray();

    return [

        'county_id' => $faker->randomElement($counties),
        'constituency_name' => $faker->state

    ];

});
