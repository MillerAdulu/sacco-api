<?php

use Illuminate\Database\Seeder;

class BusinessNatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\BusinessNature', 50)->create();
    }
}
