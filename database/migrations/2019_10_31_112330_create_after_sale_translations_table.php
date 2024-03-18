<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfterSaleTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('after_sale_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('after_sale_id')->unsigned();
            $table->string('locale');
            $table->string('title', 255);
            $table->string('address', 255);
            $table->text('description');
            $table->foreign('after_sale_id')->references('id')->on('after_sales');
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
        Schema::dropIfExists('after_sale_translations');
    }
}
