<?php

use Illuminate\Database\Seeder;

class EmploymentDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\EmploymentDetail', 200)->create();
    }
}
