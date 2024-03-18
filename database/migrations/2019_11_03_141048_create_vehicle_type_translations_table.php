<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTypeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_type_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('vehicleType_id')->unsigned();
            $table->string('locale', 255);
            $table->string('title', 255);
            $table->foreign('vehicleType_id')->references('id')->on('vehicle_types');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_type_translations');
    }
}
