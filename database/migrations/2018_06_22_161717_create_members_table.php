<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {

            $table->increments('member_id');

            $table->string('identification_number', 100);
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('other_name')->nullable();
            $table->text('id_file_url')->nullable();

            $table->date('date_of_birth');
            $table->string('phone_number', 20);
            $table->string('email')->nullable();
            $table->string('password')->nullable();

            $table->string('kra_pin')->nullable();
            $table->text('kra_certificate')->nullable();

            $table->integer('address_detail_id')->nullable();

            $table->boolean('gender');
            $table->text('passport_photo')->nullable();
            $table->integer('marital_status_id')->nullable();

            $table->decimal('proposed_monthly_contribution', 8, 2)->nullable();
            $table->integer('payment_details_id')->nullable();
            $table->integer('employment_details_id')->nullable();
            $table->integer('business_details_id')->nullable();

            $table->timestamps();

            $table->foreign('marital_status_id')->references('marital_status_id')->on('marital_statuses');
            $table->foreign('address_detail_id')->references('member_id')->on('address_details');
            $table->foreign('employment_details_id')->references('employment_details_id')->on('employment_details');
            $table->foreign('business_details_id')->references('business_details_id')->on('business_details');
            $table->foreign('payment_details_id')->references('payment_details_id')->on('payment_details');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
