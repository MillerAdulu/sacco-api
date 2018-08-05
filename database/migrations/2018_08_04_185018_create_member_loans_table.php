<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_loans', function (Blueprint $table) {
            $table->increments('member_loan_id');

            $table->integer('member_id');
            $table->smallInteger('loan_type_id');
            $table->string('loan_purpose');
            $table->decimal('loan_amount');
            $table->integer('repayment_period');
            $table->smallInteger('loan_repayment_status_id');
            $table->smallInteger('loan_issuing_status_id');
            
            $table->timestamps();

            $table->foreign('member_id')->references('member_id')->on('members');
            $table->foreign('loan_repayment_status_id')->references('loan_repayment_status_id')->on('loan_repayment_statuses');
            $table->foreign('loan_issuing_status_id')->references('loan_issuing_status_id')->on('loan_issuing_statuses');
            $table->foreign('loan_type_id')->references('loan_type_id')->on('loan_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_loans');
    }
}
