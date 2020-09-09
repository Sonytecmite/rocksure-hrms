<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependantsMedicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependants_medical_histories', function (Blueprint $table) {
            $table->id();
            $table->string("emp_id")->references("emp_id")->on("employees");
            $table->string("dependant_name");
            $table->string("hospital");
            $table->string("health_issue");
            $table->date("date");
            $table->string("attachment");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dependants_medical_histories');
    }
}
