<?php
  
  use Illuminate\Support\Facades\Schema;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Database\Migrations\Migration;
  
  class CreateBusinessesTable extends Migration
  {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('businesses', function (Blueprint $table) {
        
        $table->increments('business_id');
        $table->integer('member_id')->nullable();
        
        $table->string('business_name', 100);
        $table->integer('business_nature_id');
        $table->decimal('approximate_monthly_income', 8, 2)->nullable();
        
        $table->timestamps();
        
        $table->foreign('member_id')->references('member_id')->on('members');
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
      Schema::dropIfExists('businesses');
    }
  }
