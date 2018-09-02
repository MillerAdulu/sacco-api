<?php
  
  use Faker\Generator as Faker;
  
  $factory->define(App\LoanRepaymentStatus::class, function (Faker $faker) {
    return [
      'loan_repayment_status' => $faker->state
    ];
  });
