<?php
  
  use App\BusinessNature;
  use Faker\Generator as Faker;
  
  $factory->define(App\Employer::class, function (Faker $faker) {
    
    $business_natures = BusinessNature::all()->pluck('business_nature_id')->toArray();
    return [
      
      'employer_name' => $faker->company,
      'business_nature_id' => $faker->randomElement($business_natures),
    
    ];
    
  });
