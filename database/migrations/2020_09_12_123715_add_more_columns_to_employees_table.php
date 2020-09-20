<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnsToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string("hobbies");
            $table->string("religion");
            $table->string("country");
            $table->string("lang_spoken");
            $table->string("passport_number");
            $table->date("ppt_exp_date");
            $table->string("license_number");
            $table->char("license_class");
            $table->date("license_exp_date");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            //
        });
    }
}
