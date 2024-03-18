<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('offer_id')->unsigned();
            $table->string('locale');
            $table->string('title', 255);
            $table->string('warranty', 255)->nullable();
            $table->text('description');
            $table->foreign('offer_id')->references('id')->on('offers');
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
        Schema::dropIfExists('offer_translations');
    }
}
