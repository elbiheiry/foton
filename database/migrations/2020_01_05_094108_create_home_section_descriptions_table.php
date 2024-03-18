<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeSectionDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_section_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('setting_id');
            $table->string('section');
            $table->string('en_description', 255);
            $table->string('ar_description', 255);
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
        Schema::dropIfExists('home_section_descriptions');
    }
}
