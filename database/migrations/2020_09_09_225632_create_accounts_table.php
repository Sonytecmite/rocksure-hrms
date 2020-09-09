<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id')->references('emp_id')->on('employees');
            $table->integer("salary_id")->references("id")->on("salaries");
            $table->string("bank_name");
            $table->string("account_no");
            $table->string("bank_branch");
            $table->decimal("holiday_allowance", 5, 2)->nullable();
            $table->decimal("leave_allowance", 5, 2)->nullable();
            $table->decimal("rent_allowance", 5, 2)->nullable();
            $table->decimal("medical_bill", 5, 2)->nullable();
            $table->decimal("travel_allowance", 5, 2)->nullable();
            $table->decimal("resp_allowance", 5, 2)->nullable();
            $table->decimal("night_allowance", 5, 2)->nullable();
            $table->decimal("year_end_bonus", 5, 2)->nullable();
            $table->decimal("overtime_pay", 5, 2)->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
