<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSliderTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_slider_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('home_slider_id')->unsigned();
            $table->string('locale');
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();
            $table->foreign('home_slider_id')->references('id')->on('home_sliders');
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
        Schema::dropIfExists('home_slider_translations');
    }
}
