<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfterSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('after_sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(true);
            $table->mediumInteger('city_id')->unsigned();
            $table->text('map')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
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
        Schema::dropIfExists('after_sales');
    }
}
