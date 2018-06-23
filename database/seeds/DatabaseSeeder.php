<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountySeeder::class);

        $this->call(ConstituencySeeder::class);

        $this->call(LocalitySeeder::class);

        $this->call(PostOfficeSeeder::class);
    }
}
