<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoverColumnToOffersEventsBlogsImageGallaryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->text('cover')->nullable();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->text('cover')->nullable();
        });

        Schema::table('images_gallaries', function (Blueprint $table) {
            $table->text('cover')->nullable();
        });

        Schema::table('offers', function (Blueprint $table) {
            $table->text('cover')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            //
        });

        Schema::table('events', function (Blueprint $table) {
            //
        });

        Schema::table('images_gallaries', function (Blueprint $table) {
            //
        });

        Schema::table('offers', function (Blueprint $table) {
            //
        });
    }
}
