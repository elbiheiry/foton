<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToCityStateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('states', function (Blueprint $table) {
            $table->string('name_ar', 255)->nullable();
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->string('name_ar', 255)->nullable();
        });

        Schema::table('countries', function (Blueprint $table) {
            $table->string('name_ar', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('state', function (Blueprint $table) {
            //
        });
    }
}
