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
            $table->string('password', 150)->nullable();

            $table->string('kra_pin')->nullable();
            $table->text('kra_certificate')->nullable();

            $table->boolean('gender')->nullable();
            $table->text('passport_photo')->nullable();
            $table->integer('marital_status_id')->nullable();

            $table->decimal('proposed_monthly_contribution', 8, 2);

            $table->timestamps();

            $table->foreign('marital_status_id')->references('marital_status_id')->on('marital_statuses');


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