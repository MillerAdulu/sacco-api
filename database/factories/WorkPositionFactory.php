<?php
  
  use Faker\Generator as Faker;
  
  $factory->define(App\WorkPosition::class, function (Faker $faker) {
    
    return [
      
      'work_position' => $faker->jobTitle
    
    ];
  });
