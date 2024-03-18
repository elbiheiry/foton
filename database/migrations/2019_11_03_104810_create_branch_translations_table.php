<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('branch_id')->unsigned();
            $table->string('locale');
            $table->string('title', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->foreign('branch_id')->references('id')->on('branches');
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
        Schema::dropIfExists('branch_translations');
    }
}
