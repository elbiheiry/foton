<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterFeturesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_fetures_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('footer_fetures_id')->unsigned();
            $table->string('locale');
            $table->string('title', 255)->nullable();
            $table->string('description')->nullable();
            $table->foreign('footer_fetures_id')->references('id')->on('footer_fetures');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footer_fetures_translations');
    }
}
