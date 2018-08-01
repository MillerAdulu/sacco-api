<?php

use App\Member;
use App\PaymentMethod;
use Faker\Generator as Faker;

$factory->define(App\PaymentDetail::class, function (Faker $faker) {

    $members = Member::all()->pluck('member_id')->toArray();
    $payment_methods = PaymentMethod::all()->pluck('payment_method_id')->toArray();

    return [

        'member_id' => $faker->randomElement($members),
        'payment_method_id' => $faker->randomElement($payment_methods),

        'bank_account_number' => $faker->bankAccountNumber,
        'card_number' => $faker->bankAccountNumber,
        'phone_number' => $faker->e164PhoneNumber,
        'provider' => $faker->firstName

    ];
});
