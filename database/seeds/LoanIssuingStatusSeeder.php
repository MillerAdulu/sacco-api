<?php

use Illuminate\Database\Seeder;

class LoanIssuingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\LoanIssuingStatus', 4)->create();
    }
}
