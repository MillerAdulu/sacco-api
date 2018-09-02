<?php
  
  use Illuminate\Database\Seeder;
  
  class ConstituencySeeder extends Seeder
  {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      factory('App\Constituency', 20)->create();
      
    }
  }
