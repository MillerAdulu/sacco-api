<?php
  
  use Faker\Generator as Faker;
  
  $factory->define(App\PaymentMethod::class, function (Faker $faker) {
    return [
      
      'payment_method_name' => $faker->creditCardType
    
    ];
  });
