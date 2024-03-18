<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleModelTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_model_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('vehicle_model_id')->unsigned();
            $table->foreign('vehicle_model_id')->references('id')->on('vehicle_models');
            $table->string('locale');
            $table->string('title', 255);
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
        Schema::dropIfExists('vehicle_model_translations');
    }
}
