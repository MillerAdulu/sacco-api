<?php

use App\MaritalStatus;
use Faker\Generator as Faker;

$factory->define(App\Member::class, function (Faker $faker) {

    $marital_statuses = MaritalStatus::all()->pluck('marital_status_id')->toArray();

    $image_url = $faker->imageUrl($width = 200, $height = 200);
    return [

        'identification_number' => $faker->ean13,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'other_name' => $faker->word,
        'id_file_url' => $image_url,

        'date_of_birth' => $faker->date('Y-m-d', 'now'),
        'phone_number' => $faker->e164PhoneNumber,
        'email' => $faker->email,
        'password' => $faker->sha256,

        'kra_pin' => $faker->swiftBicNumber,
        'kra_certificate' => $image_url,

        'gender' => $faker->boolean,
        'passport_photo' => $image_url,
        'marital_status_id' => $faker->randomElement($marital_statuses),

        'proposed_monthly_contribution' => $faker->randomFloat(2, 0, 999999),

    ];

});
