<?php

use Faker\Generator as Faker;

$factory->define(App\MaritalStatus::class, function (Faker $faker) {
    return [

        'marital_status' => $faker->word

    ];
});
