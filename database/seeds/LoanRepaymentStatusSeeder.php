<?php

use Illuminate\Database\Seeder;

class LoanRepaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\LoanRepaymentStatus', 4)->create();
    }
}
