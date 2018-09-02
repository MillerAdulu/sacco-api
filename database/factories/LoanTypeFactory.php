<?php
  
  use Faker\Generator as Faker;
  
  $factory->define(App\LoanType::class, function (Faker $faker) {
    return [
      'loan_type_name' => $faker->streetName
    ];
  });
