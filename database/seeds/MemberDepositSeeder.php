<?php
  
  use Illuminate\Database\Seeder;
  
  class MemberDepositSeeder extends Seeder
  {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory('App\MemberDeposit', 300)->create();
    }
  }
