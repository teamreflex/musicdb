<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameSpotifyToSpotifyIdOnSubunits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subunits', function (Blueprint $table) {
            $table->renameColumn('spotify', 'spotify_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subunits', function (Blueprint $table) {
            $table->renameColumn('spotify_id', 'spotify');
        });
    }
}
