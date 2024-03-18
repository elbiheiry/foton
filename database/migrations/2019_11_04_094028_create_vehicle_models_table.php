<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(true);
            $table->bigInteger('vehicle_id')->unsigned();
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->text('image');
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
        Schema::dropIfExists('vehicle_models');
    }
}
