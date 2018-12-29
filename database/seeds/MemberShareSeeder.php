<?php

use Illuminate\Database\Seeder;

class MemberShareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\MemberShare', 300)->create();
    }
}
