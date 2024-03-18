<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealerTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('dealer_id')->unsigned();
            $table->string('locale');
            $table->string('title', 255);
            $table->string('address', 255)->nullable();
            $table->foreign('dealer_id')->references('id')->on('dealers');
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
        Schema::dropIfExists('dealer_translations');
    }
}
