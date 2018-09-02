<?php
  
  use Faker\Generator as Faker;
  
  $factory->define(App\Relationship::class, function (Faker $faker) {
    return [
      
      'relationship_name' => $faker->word
    
    ];
  });
