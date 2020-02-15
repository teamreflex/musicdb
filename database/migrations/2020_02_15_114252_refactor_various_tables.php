<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RefactorVariousTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Members
        Schema::table('members', function (Blueprint $table) {
            $table->string('stage_name_en')->nullable();
            $table->string('stage_name_kr')->nullable();
            $table->string('image')->nullable();
        });
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('name_romanized');
        });
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('facebook');
        });
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('header_url');
        });
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('icon_url');
        });
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('logo_url');
        });

        // Albums
        Schema::table('albums', function (Blueprint $table) {
            $table->renameColumn('icon_url', 'spotify_image');
        });
        Schema::table('albums', function (Blueprint $table) {
            $table->string('cover_art')->nullable();
            $table->string('album_image')->nullable();
        });
        Schema::table('albums', function (Blueprint $table) {
            $table->dropColumn('name_romanized');
        });
        Schema::table('albums', function (Blueprint $table) {
            $table->dropColumn('logo_url');
        });
        Schema::table('albums', function (Blueprint $table) {
            $table->dropColumn('header_url');
        });

        // Artists
        Schema::table('artists', function (Blueprint $table) {
            $table->renameColumn('icon_url', 'spotify_image');
        });
        Schema::table('artists', function (Blueprint $table) {
            $table->renameColumn('logo_url', 'logo');
        });
        Schema::table('artists', function (Blueprint $table) {
            $table->renameColumn('header_url', 'image');
        });

        // Subunits
        Schema::table('subunits', function (Blueprint $table) {
            $table->dropColumn('name_romanized');
        });
        Schema::table('subunits', function (Blueprint $table) {
            $table->renameColumn('icon_url', 'spotify_image');
        });
        Schema::table('subunits', function (Blueprint $table) {
            $table->renameColumn('header_url', 'image');
        });
        Schema::table('subunits', function (Blueprint $table) {
            $table->renameColumn('logo_url', 'logo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Members
        Schema::table('members', function (Blueprint $table) {
            $table->string('name_romanized')->nullable();
            $table->string('facebook')->nullable();
            $table->string('header_url')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('icon_url')->nullable();
        });
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('stage_name_en');
        });
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('stage_name_kr');
        });
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('image');
        });

        // Albums
        Schema::table('albums', function (Blueprint $table) {
            $table->string('name_romanized')->nullable();
            $table->string('header_url')->nullable();
            $table->string('logo_url')->nullable();
        });
        Schema::table('albums', function (Blueprint $table) {
            $table->renameColumn('spotify_image', 'icon_url');
        });
        Schema::table('albums', function (Blueprint $table) {
            $table->dropColumn('cover_art');
        });

        // Artists
        Schema::table('artists', function (Blueprint $table) {
            $table->renameColumn('spotify_image', 'icon_url');
        });
        Schema::table('artists', function (Blueprint $table) {
            $table->renameColumn('logo', 'logo_url');
        });
        Schema::table('artists', function (Blueprint $table) {
            $table->renameColumn('image', 'header_url');
        });

        // Subunits
        Schema::table('subunits', function (Blueprint $table) {
            $table->string('name_romanized')->nullable();
        });
        Schema::table('subunits', function (Blueprint $table) {
            $table->renameColumn('spotify_image', 'icon_url');
        });
        Schema::table('subunits', function (Blueprint $table) {
            $table->renameColumn('image', 'header_url');
        });
        Schema::table('subunits', function (Blueprint $table) {
            $table->renameColumn('logo', 'logo_url');
        });
    }
}
