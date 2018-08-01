<?php

use Illuminate\Database\Seeder;

class NomineeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Nominee', 1000)->create();
    }
}
