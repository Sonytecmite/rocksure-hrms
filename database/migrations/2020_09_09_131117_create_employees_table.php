<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->string("empId");
            $table->string("first_name");
            $table->string("last_name");
            $table->string("middle_name");
            $table->enum("marital_status", ['single', 'married', 'divorsed', 'separeted', 'engaged']);
            $table->date("dob");
            $table->string("hometown");
            $table->string("nationality");
            $table->string("photo");
            $table->id("job_id")->references("job_id")->on("jobs");
            $table->string("place_of_stay");
            $table->string("point_of_hire");
            $table->enum("gender", ["male", "female"]);
            $table->string("department_id")->references("department_id")->on("departments");
            $table->string("section");
            $table->string("contract_file");
            $table->string("allergy");
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
        Schema::dropIfExists('employees');
    }
}
