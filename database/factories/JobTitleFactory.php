<?php
  
  use Faker\Generator as Faker;
  
  $factory->define(App\JobTitle::class, function (Faker $faker) {
    
    return [
      
      'job_title' => $faker->jobTitle
    
    ];
    
  });
