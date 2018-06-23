<?php

use Illuminate\Database\Seeder;

class WorkPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\WorkPosition', 50)->create();
    }
}
