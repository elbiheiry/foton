<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparePartTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spare_part_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sparePart_id')->unsigned();
            $table->string('locale', 255);
            $table->string('title', 255);
            $table->foreign('sparePart_id')->references('id')->on('spare_parts');
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
        Schema::dropIfExists('spare_part_translations');
    }
}
