<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNomineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominees', function (Blueprint $table) {
            $table->increments('nominee_id');

            $table->string('identification_number', 100);
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('other_name')->nullable();
            $table->integer('member_id');
            $table->integer('relationship_id');
            $table->string('phone_number');
            $table->string('email')->nulllable();

            $table->timestamps();

            $table->foreign('relationship_id')->references('relationship_id')->on('relationships');
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
        Schema::dropIfExists('nominees');
    }
}
