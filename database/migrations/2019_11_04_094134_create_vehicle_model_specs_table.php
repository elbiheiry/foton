<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleModelSpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_model_specifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('modelable_id')->unsigned();
            $table->string('modelable_type', 255);
            $table->bigInteger('spec_id')->unsigned();
            $table->foreign('spec_id')->references('id')->on('specs');
            $table->string('value_en', 255)->nullable();
            $table->string('value_ar', 255)->nullable();
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
        Schema::dropIfExists('vehicle_model_specs');
    }
}
