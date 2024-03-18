<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleTypeSliderTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_type_slider_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('vehicle_type_slider_id')->unsigned();
            $table->string('locale');
            $table->string('title', 255);
            $table->text('description');
            $table->foreign('vehicle_type_slider_id')->references('id')->on('vehicle_type_sliders');
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
        Schema::dropIfExists('vehicle_type_slider_translations');
    }
}
