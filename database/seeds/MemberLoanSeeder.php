<?php
  
  use Illuminate\Database\Seeder;
  
  class MemberLoanSeeder extends Seeder
  {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory('App\MemberLoan', 200)->create();
    }
  }
