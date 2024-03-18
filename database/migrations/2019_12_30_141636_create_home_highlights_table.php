<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeHighlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_highlights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('setting_id');
            $table->string('en_title', 255);
            $table->string('ar_title', 255);
            $table->string('en_description', 255);
            $table->string('ar_description', 255);
            $table->text('image');
            $table->integer('order')->unsigned();
            $table->text('link');
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
        Schema::dropIfExists('home_highlights');
    }
}
