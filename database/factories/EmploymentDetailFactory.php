<?php
  
  use App\Employer;
  use App\Member;
  use App\JobTitle;
  use Faker\Generator as Faker;
  
  $factory->define(App\EmploymentDetail::class, function (Faker $faker) {
    
    $members = Member::all()->pluck('member_id')->toArray();
    $employers = Employer::all()->pluck('employer_id')->toArray();
    $job_titles = JobTitle::all()->pluck('job_title_id')->toArray();
    
    return [
      
      'member_id' => $faker->randomElement($members),
      'employer_id' => $faker->randomElement($employers),
      'job_title_id' => $faker->randomElement($job_titles),
      'work_station' => $faker->city,
      'commencement_date' => $faker->date('Y-m-d', 'now'),
      'salary' => $faker->randomFloat(2, 0,999999),
      'payroll_number' => $faker->iban(null)
    
    ];
    
  });
