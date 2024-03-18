<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoGallaryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_gallary_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('videoGallary_id')->unsigned();
            $table->string('locale');
            $table->string('title', 255);
            $table->foreign('videoGallary_id')->references('id')->on('video_gallaries');
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
        Schema::dropIfExists('video_gallary_translations');
    }
}
