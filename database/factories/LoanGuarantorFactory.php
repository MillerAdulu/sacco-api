<?php

use App\MemberLoan;
use Faker\Generator as Faker;

$factory->define(App\LoanGuarantor::class, function (Faker $faker) {
    $memberLoans = MemberLoan::all()->pluck('member_loan_id')->toArray();

    return [
        'member_loan_id' => $faker->randomElement($memberLoans),
        'identification_number' => $faker->ean13,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'other_name' => $faker->word,
        'phone_number' => $faker->e164PhoneNumber
    ];
});
