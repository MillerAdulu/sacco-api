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
        
        $table->string('identification_number', 100)->unique();
        $table->string('first_name', 30);
        $table->string('last_name', 30);
        $table->string('other_name')->nullable();
        
        $table->date('date_of_birth');
        $table->string('phone_number', 20);
        $table->string('email')->nullable();
        
        $table->string('kra_pin')->nullable();
        
        $table->boolean('gender')->nullable();
        $table->text('passport_photo')->nullable();
        $table->integer('marital_status_id')->nullable();
        
        $table->decimal('proposed_monthly_deposit', 8, 2);
        
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