<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_details', function (Blueprint $table) {

            $table->increments('employment_details_id');

            $table->integer('employer_id');
            $table->integer('work_position_id');
            $table->string('work_station');
            $table->date('commencement_date');
            $table->decimal('salary', 8, 2);
            $table->string('payroll_number');

            $table->date('termination_date')->nullable();

            $table->timestamps();


            $table->foreign('employer_id')->references('employer_id')->on('employers');
            $table->foreign('work_position_id')->references('work_position_id')->on('work_positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employment_details');
    }
}
