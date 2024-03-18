<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('vehicle_id')->unsigned();
            $table->text('image');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
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
        Schema::dropIfExists('vehicle_sliders');
    }
}
