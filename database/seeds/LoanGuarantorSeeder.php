<?php
  
  use Illuminate\Database\Seeder;
  
  class LoanGuarantorSeeder extends Seeder
  {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory('App\LoanGuarantor', 200)->create();
    }
  }
