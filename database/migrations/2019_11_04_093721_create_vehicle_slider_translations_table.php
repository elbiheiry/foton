<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleSliderTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_slider_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('vehicle_slider_id')->unsigned();
            $table->string('locale');
            $table->string('title', 255);
            $table->text('description');
            $table->foreign('vehicle_slider_id')->references('id')->on('vehicle_sliders');
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
        Schema::dropIfExists('vehicle_slider_translations');
    }
}
