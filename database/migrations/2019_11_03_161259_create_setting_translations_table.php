<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('setting_id')->unsigned();
            $table->string('locale', 255);
            $table->string('address', 255);
            $table->string('currency', 255);
            $table->foreign('setting_id')->references('id')->on('settings');
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
        Schema::dropIfExists('setting_translations');
    }
}
