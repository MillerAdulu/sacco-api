<?php

use Illuminate\Database\Seeder;

class MemberContributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\MemberContribution', 300)->create();
    }
}
