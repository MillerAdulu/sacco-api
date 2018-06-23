<?php

use App\Constituency;
use Faker\Generator as Faker;

$factory->define(App\Locality::class, function (Faker $faker) {

    $constituencies = Constituency::all()->pluck('constituency_id')->toArray();

    return [

        'constituency_id' => $faker->randomElement($constituencies),
        'locality_name' => $faker->citySuffix

    ];

});
