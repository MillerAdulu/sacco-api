<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultsToMemberLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('member_loans', function (Blueprint $table) {
            $table->unsignedInteger('loan_repayment_status_id')->default(1)->change();
            $table->unsignedInteger('loan_issuing_status_id')->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('member_loans', function (Blueprint $table) {
            $table->unsignedInteger('loan_repayment_status_id')->change();
            $table->unsignedInteger('loan_issuing_status_id')->change();
        });
    }
}
