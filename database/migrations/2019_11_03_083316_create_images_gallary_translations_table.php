<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesGallaryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_gallary_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('imagesGallary_id')->unsigned();
            $table->string('locale');
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->foreign('imagesGallary_id')->references('id')->on('images_gallaries');
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
        Schema::dropIfExists('images_gallary_translations');
    }
}
