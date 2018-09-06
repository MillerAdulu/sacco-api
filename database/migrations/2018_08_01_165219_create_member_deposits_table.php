<?php
  
  use Illuminate\Support\Facades\Schema;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Database\Migrations\Migration;
  
  class CreateMemberDepositsTable extends Migration
  {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('member_deposits', function (Blueprint $table) {
        $table->increments('member_deposit_id');
        
        $table->integer('member_id');
        $table->integer('payment_method_id');
        $table->decimal('deposit_amount');
        $table->string('comment')->nullable();
        
        $table->timestamps();
        
        $table->index('member_id');
        $table->foreign('member_id')->references('member_id')->on('members');
        $table->foreign('payment_method_id')->references('payment_method_id')->on('payment_methods');
      });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('member_deposits');
    }
  }
