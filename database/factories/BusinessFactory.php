<?php

use App\Member;
use App\BusinessNature;

use Faker\Generator as Faker;

$factory->define(App\Business::class, function (Faker $faker) {

    $members = Member::all()->pluck('member_id')->toArray();
    $business_natures = BusinessNature::all()->pluck('business_nature_id')->toArray();

    return [

        'member_id' => $faker->randomElement($members),

        'business_name' => $faker->company,
        'business_nature_id' => $faker->randomElement($business_natures),
        'approximate_monthly_income' => $faker->randomFloat(2, 0, 999999),

    ];

});
