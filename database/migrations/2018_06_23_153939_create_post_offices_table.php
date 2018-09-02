<?php
  
  use Illuminate\Support\Facades\Schema;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Database\Migrations\Migration;
  
  class CreatePostOfficesTable extends Migration
  {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('post_offices', function (Blueprint $table) {
        
        $table->increments('post_office_id');
        
        $table->string('post_office_code', 10);
        $table->string('post_office_name', 30);
        
        $table->timestamps();
        
      });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('post_offices');
    }
  }
