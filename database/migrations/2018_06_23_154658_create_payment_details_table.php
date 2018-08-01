<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {

            $table->increments('payment_details_id');

            $table->integer('payment_method_id');
            $table->integer('member_id')->nullable();
            $table->integer('business_id')->nullable();

            $table->string('bank_name', 50)->nullable();
            $table->string('bank_account_number', 60)->nullable();
            $table->string('card_number', 30)->nullable();

            $table->string('provider', 50)->nullable();
            $table->string('phone_number', 20)->nullable();

            $table->timestamps();


            $table->foreign('payment_method_id')->references('payment_method_id')->on('payment_methods');
            $table->foreign('business_id')->references('business_id')->on('businesses');
            $table->foreign('member_id')->references('member_id')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_details');
    }
}
