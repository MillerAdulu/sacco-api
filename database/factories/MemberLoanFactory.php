<?php
  
  use App\Member;
  use App\LoanType;
  use App\LoanRepaymentStatus;
  use App\LoanIssuingStatus;
  
  use Faker\Generator as Faker;
  
  $factory->define(App\MemberLoan::class, function (Faker $faker) {
    $members = Member::all()->pluck('member_id')->toArray();
    $loanTypes = LoanType::all()->pluck('loan_type_id')->toArray();
    $repaymentStatuses = LoanRepaymentStatus::all()->pluck('loan_repayment_status_id')->toArray();
    $issuingStatuses = LoanIssuingStatus::all()->pluck('loan_issuing_status_id')->toArray();
    
    return [
      'member_id' => $faker->randomElement($members),
      'loan_type_id' => $faker->randomElement($loanTypes),
      'loan_purpose' => $faker->word,
      'loan_amount' => $faker->randomFloat(2, 0, 999999),
      'repayment_period' => $faker->randomNumber(),
      'loan_repayment_status_id' => $faker->randomElement($repaymentStatuses),
      'loan_issuing_status_id' => $faker->randomElement($issuingStatuses)
    ];
  });
