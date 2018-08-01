<?php

use App\Member;
use App\Relationship;
use Faker\Generator as Faker;

$factory->define(App\Nominee::class, function (Faker $faker) {
    $members = Member::all()->pluck('member_id')->toArray();
    $relationships = Relationship::all()->pluck('relationship_id')->toArray();

    return [
        'identification_number' => $faker->ean13,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'other_name' => $faker->word,
        'phone_number' => $faker->e164PhoneNumber,
        'email' => $faker->email,
        'member_id' => $faker->randomElement($members),
        'relationship_id' => $faker->randomElement($relationships)
    ];
});
