<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deductions', function (Blueprint $table) {
            $table->id();
            $table->string("emp_id")->references("emp_id")->on("employees");
            $table->decimal("income_tax", 5, 2);
            $table->decimal("tier1_ssf", 5, 2);
            $table->decimal("tier2_ssf", 5, 2);
            $table->decimal("prov_fund", 5, 2);
            $table->decimal("ssnit", 5, 2);
            $table->decimal("company_loan", 5, 2)->nullable();
            $table->decimal("bank_loan", 5, 2)->nullable();
            $table->decimal("salary_advance", 5, 2);
            $table->decimal("absent_deduction", 5, 2);
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
        Schema::dropIfExists('deductions');
    }
}
