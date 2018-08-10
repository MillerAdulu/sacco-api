<?php

use Faker\Generator as Faker;
use App\Member;
use App\PaymentMethod;

$factory->define(App\MemberContribution::class, function (Faker $faker) {
    $members = Member::all()->pluck('member_id')->toArray();
    $payment_methods = PaymentMethod::all()->pluck('payment_method_id')->toArray();
    
    return [
        'member_id' => $faker->randomElement($members),
        'payment_method_id' => $faker->randomElement($payment_methods),
        'contribution_amount' => $faker->randomFloat(2, 0, 999999),
        'comment' => $faker->word
    ];
});
