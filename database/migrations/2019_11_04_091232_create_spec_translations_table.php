<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spec_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('spec_id')->unsigned();
            $table->string('locale');
            $table->string('title', 255);
            $table->foreign('spec_id')->references('id')->on('specs');
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
        Schema::dropIfExists('spec_translations');
    }
}
