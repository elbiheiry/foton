<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesGallariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_gallaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(true);
            $table->boolean('featured')->default(false);
            $table->dateTime('date')->nullable();
            $table->text('image')->nullable();
            $table->text('gallary')->nullable();
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
        Schema::dropIfExists('images_gallaries');
    }
}
