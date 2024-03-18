<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToDealerTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dealer_translations', function (Blueprint $table) {
            $table->text('working_hour')->nullable();
        });

        Schema::table('branch_translations', function (Blueprint $table) {
            $table->text('working_hour')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dealer_translations', function (Blueprint $table) {
            //
        });

        Schema::table('branch_translations', function (Blueprint $table) {
            //
        });
    }
}
