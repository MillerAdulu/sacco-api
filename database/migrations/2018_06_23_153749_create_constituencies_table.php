<?php
  
  use Illuminate\Support\Facades\Schema;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Database\Migrations\Migration;
  
  class CreateConstituenciesTable extends Migration
  {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('constituencies', function (Blueprint $table) {
        
        $table->increments('constituency_id');
        
        $table->unsignedInteger('county_id');
        $table->string('constituency_name', 20);
        
        $table->timestamps();
        
        $table->foreign('county_id')->references('county_id')->on('counties');
        
      });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('constituencies');
    }
  }
