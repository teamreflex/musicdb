<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->unsignedBigInteger('artist_id');
            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');

            // because not every album belongs to a subunit
            $table->bigInteger('subunit_id')->nullable();

            $table->string('name_en');
            $table->string('name_kr')->nullable();
            $table->string('name_romanized')->nullable();
            $table->text('description')->nullable();
            $table->string('spotify')->nullable();
            $table->string('header_url')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('icon_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
