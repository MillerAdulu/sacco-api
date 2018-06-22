<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_details', function (Blueprint $table) {

            $table->increments('business_details_id');

            $table->string('business_name', 100);
            $table->integer('address_detail_id');
            $table->integer('business_nature_id');
            $table->decimal('approximate_monthly_income', 8, 2)->nullable();

            $table->timestamps();


            $table->foreign('address_detail_id')->references('address_detail_id')->on('address_details');
            $table->foreign('business_nature_id')->references('business_nature_id')->on('business_natures');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_details');
    }
}
