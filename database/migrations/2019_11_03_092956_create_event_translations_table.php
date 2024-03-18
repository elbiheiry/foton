<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('event_id')->unsigned();
            $table->string('locale');
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->foreign('event_id')->references('id')->on('events');
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
        Schema::dropIfExists('event_translations');
    }
}
