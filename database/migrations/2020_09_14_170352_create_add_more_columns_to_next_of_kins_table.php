<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddMoreColumnsToNextOfKinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('next_of_kins', function (Blueprint $table) {
            $table->string("first_name");
            $table->string("last_name");
            $table->string("other_name")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_more_columns_to_next_of_kins');
    }
}
