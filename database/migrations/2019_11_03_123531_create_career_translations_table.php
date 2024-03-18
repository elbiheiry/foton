<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareerTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('career_id')->unsigned();
            $table->string('locale');
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->foreign('career_id')->references('id')->on('careers');
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
        Schema::dropIfExists('career_translations');
    }
}
