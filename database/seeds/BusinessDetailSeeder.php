<?php

use Illuminate\Database\Seeder;

class BusinessDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\BusinessDetail', 150)->create();
    }
}
