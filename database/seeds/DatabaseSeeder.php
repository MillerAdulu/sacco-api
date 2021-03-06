<?php
  
  use Illuminate\Database\Seeder;
  
  class DatabaseSeeder extends Seeder
  {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(BusinessNatureSeeder::class);
      
      $this->call(PaymentMethodSeeder::class);
      
      $this->call(JobTitleSeeder::class);
      
      $this->call(MaritalStatusSeeder::class);
      
      $this->call(MemberSeeder::class);
      
      $this->call(CountySeeder::class);
      
      $this->call(ConstituencySeeder::class);
      
      $this->call(LocalitySeeder::class);
      
      $this->call(PostOfficeSeeder::class);
      
      $this->call(BusinessSeeder::class);
      
      $this->call(EmployerSeeder::class);
      
      $this->call(PaymentDetailSeeder::class);
      
      $this->call(AddressDetailSeeder::class);
      
      $this->call(EmploymentDetailSeeder::class);
      
      $this->call(RelationshipSeeder::class);
      
      $this->call(NomineeSeeder::class);
      
      $this->call(MemberDepositSeeder::class);
      
      $this->call(LoanRepaymentStatusSeeder::class);
      
      $this->call(LoanIssuingStatusSeeder::class);
      
      $this->call(LoanTypeSeeder::class);
      
      $this->call(MemberLoanSeeder::class);
      
      $this->call(LoanGuarantorSeeder::class);
      
    }
  }
