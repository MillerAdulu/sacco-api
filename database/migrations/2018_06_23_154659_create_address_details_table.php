<?php
  
  use Illuminate\Support\Facades\Schema;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Database\Migrations\Migration;
  
  class CreateAddressDetailsTable extends Migration
  {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('address_details', function (Blueprint $table) {
        
        $table->increments('address_detail_id');
        
        $table->unsignedInteger('member_id')->nullable();
        $table->unsignedInteger('business_id')->nullable();
        $table->unsignedInteger('employer_id')->nullable();
        
        $table->unsignedInteger('county_id');
        $table->unsignedInteger('constituency_id');
        $table->unsignedInteger('locality_id');
        $table->integer('postal_address')->nullable();
        $table->unsignedInteger('post_office_id')->nullable();
        
        $table->string('street', 50)->nullable();
        $table->string('building_name')->nullable();
        $table->string('floor', 2)->nullable();
        $table->string('house_number', 2)->nullable();
        $table->timestamps();
        
        
        $table->foreign('member_id')->references('member_id')->on('members');
        $table->foreign('business_id')->references('business_id')->on('businesses');
        $table->foreign('employer_id')->references('employer_id')->on('employers');
        $table->foreign('county_id')->references('county_id')->on('counties');
        $table->foreign('constituency_id')->references('constituency_id')->on('constituencies');
        $table->foreign('locality_id')->references('locality_id')->on('localities');
        $table->foreign('post_office_id')->references('post_office_id')->on('post_offices');
        
      });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('address_details');
    }
  }
