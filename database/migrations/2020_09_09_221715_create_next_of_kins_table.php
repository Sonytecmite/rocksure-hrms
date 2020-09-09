<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNextOfKinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('next_of_kins', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id')->references('emp_id')->on('employees');
            $table->char('contact', 10);
            $table->string('relation', 30);
            $table->string('hometown', 50);
            $table->float('percentage');
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
        Schema::dropIfExists('next_of_kins');
    }
}
