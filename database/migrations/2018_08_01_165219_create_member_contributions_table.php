<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberContributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_contributions', function (Blueprint $table) {
            $table->increments('member_contribution_id');

            $table->integer('member_id')->nullable();
            $table->integer('payment_method_id');
            $table->decimal('contribution_amount');
            
            $table->timestamps();

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
        Schema::dropIfExists('member_contributions');
    }
}
