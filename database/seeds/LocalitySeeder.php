<?php
  
  use Illuminate\Database\Seeder;
  
  class LocalitySeeder extends Seeder
  {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory('App\Locality', 100)->create();
    }
  }
