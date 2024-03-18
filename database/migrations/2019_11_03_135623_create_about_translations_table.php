<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('about_id')->unsigned();
            $table->string('locale');
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->foreign('about_id')->references('id')->on('abouts');
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
        Schema::dropIfExists('about_translations');
    }
}
