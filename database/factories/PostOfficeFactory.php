<?php
  
  use Faker\Generator as Faker;
  
  $factory->define(App\PostOffice::class, function (Faker $faker) {
    
    return [
      
      'post_office_code' => $faker->postcode,
      'post_office_name' => $faker->name
    
    ];
    
  });
