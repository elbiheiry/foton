<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSeoDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_translations', function (Blueprint $table) {
            $table->text('seo_description')->nullable();
        });

        Schema::table('event_translations', function (Blueprint $table) {
            $table->text('seo_description')->nullable();
        });

        Schema::table('images_gallary_translations', function (Blueprint $table) {
            $table->text('seo_description')->nullable();
        });

        Schema::table('offer_translations', function (Blueprint $table) {
            $table->text('seo_description')->nullable();
        });

        Schema::table('vehicle_translations', function (Blueprint $table) {
            $table->text('seo_description')->nullable();
        });

        Schema::table('setting_translations', function (Blueprint $table) {
            $table->text('seo_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
