<?php
  
  use Illuminate\Database\Seeder;
  
  class AddressDetailSeeder extends Seeder
  {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory('App\AddressDetail', 100)->create();
    }
  }
