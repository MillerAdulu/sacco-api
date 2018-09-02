<?php
  
  use Illuminate\Database\Seeder;
  
  class PaymentMethodSeeder extends Seeder
  {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory('App\PaymentMethod', 2)->create();
    }
  }
