<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisplinaryActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('displinary_actions', function (Blueprint $table) {
            $table->id();
            $table->string("emp_id")->references("emp_id")->on("employees");
            $table->string("offense");
            $table->string("sanction");
            $table->text("comment");
            $table->string("action");
            $table->date("start_date");
            $table->date("end_date");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('displinary_actions');
    }
}
