<?php
  
  use Illuminate\Database\Seeder;
  
  class PostOfficeSeeder extends Seeder
  {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory('App\PostOffice', 30)->create();
    }
  }
