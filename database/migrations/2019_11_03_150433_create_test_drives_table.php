<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestDrivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_drives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->bigInteger('vehicleType_id')->unsigned()->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->mediumInteger('state_id')->unsigned()->nullable();
            $table->foreign('vehicleType_id')->references('id')->on('vehicle_types');
            $table->foreign('state_id')->references('id')->on('states');
            $table->softDeletes();
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
        Schema::dropIfExists('test_drives');
    }
}
