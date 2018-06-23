<?php

use App\Employer;
use App\Member;
use App\WorkPosition;
use Faker\Generator as Faker;

$factory->define(App\EmploymentDetail::class, function (Faker $faker) {
    $members = Member::all()->pluck('member_id')->toArray();
    $employers = Employer::all()->pluck('employer_id')->toArray();
    $worker_positions = WorkPosition::all()->pluck('work_position_id')->toArray();

    return [

        'member_id' => $faker->randomElement($members),
        'employer_id' => $faker->randomElement($employers),
        'work_position_id' => $faker->randomElement($worker_positions),
        'work_station' => $faker->city,
        'commencement_date' => $faker->date('Y-m-d', 'now'),
        'salary' => $faker->randomFloat(2, 0,999999),
        'payroll_number' => $faker->iban(null)

    ];

});
