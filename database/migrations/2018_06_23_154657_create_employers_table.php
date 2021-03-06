<?php
  
  use Illuminate\Support\Facades\Schema;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Database\Migrations\Migration;
  
  class CreateEmployersTable extends Migration
  {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('employers', function (Blueprint $table) {
        
        $table->increments('employer_id');
        
        $table->string('employer_name', 100);
        $table->unsignedInteger('business_nature_id');
        
        $table->timestamps();
        
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
      Schema::dropIfExists('employers');
    }
  }
