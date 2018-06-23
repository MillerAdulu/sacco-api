<?php

use Faker\Generator as Faker;

$factory->define(App\BusinessNature::class, function (Faker $faker) {

    return [

        'nature_of_business' => $faker->realText(100, 2)

    ];

});
