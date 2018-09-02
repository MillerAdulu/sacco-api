<?php
  
  use Faker\Generator as Faker;
  
  $factory->define(App\LoanIssuingStatus::class, function (Faker $faker) {
    return [
      'loan_issuing_status' => $faker->word
    ];
  });
