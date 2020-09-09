<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id')->references('emp_id')->on('employees');
            $table->char('phone1', 10);
            $table->char('phone2', 10);
            $table->string('email')->unique();
            $table->string('postal_address', 100);
            $table->string('residential_address', 100);
            $table->string('gps_address', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
