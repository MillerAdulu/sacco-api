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
        
        $table->unsignedInteger('employer_id');
        $table->unsignedInteger('member_id');
        $table->unsignedInteger('job_title_id');
        $table->string('work_station');
        $table->date('commencement_date');
        $table->decimal('salary', 8, 2);
        $table->string('payroll_number');
        
        $table->date('termination_date')->nullable();
        
        $table->timestamps();
        
        
        $table->foreign('employer_id')->references('employer_id')->on('employers');
        $table->foreign('member_id')->references('member_id')->on('members');
        $table->foreign('job_title_id')->references('job_title_id')->on('job_titles');
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
