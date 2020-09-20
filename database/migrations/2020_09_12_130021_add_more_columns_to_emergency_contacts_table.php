<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnsToEmergencyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emergency_contacts', function (Blueprint $table) {
            $table->dropColumn("full_name");
            $table->string("first_name");
            $table->string("last_name");
            $table->string("other_name");
            $table->string("relationship");
            $table->string("home_address");
            $table->string("digital_address");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emergency_contacts', function (Blueprint $table) {
            //
        });
    }
}
