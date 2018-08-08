<?php

use App\MaritalStatus;
use Faker\Generator as Faker;

$factory->define(App\Member::class, function (Faker $faker) {

    $marital_statuses = MaritalStatus::all()->pluck('marital_status_id')->toArray();

    return [

        'identification_number' => $faker->ean13,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'other_name' => $faker->word,

        'date_of_birth' => $faker->date('Y-m-d', 'now'),
        'phone_number' => $faker->e164PhoneNumber,
        'email' => $faker->email,

        'kra_pin' => $faker->swiftBicNumber,

        'gender' => $faker->boolean,
        'passport_photo' => $faker->imageUrl($width = 200, $height = 200),
        'marital_status_id' => $faker->randomElement($marital_statuses),

        'proposed_monthly_contribution' => $faker->randomFloat(2, 0, 999999),

    ];

});
