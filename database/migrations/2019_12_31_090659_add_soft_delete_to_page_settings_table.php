<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeleteToPageSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_settings', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('page_setting_translations', function (Blueprint $table) {
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
        Schema::table('page_settings', function (Blueprint $table) {
            //
        });

        Schema::table('page_setting_translations', function (Blueprint $table) {
            //
        });
    }
}
