<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_photos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->String("photo_name");
            $table->String ("photo_directory");
        });
    }
        Schema::dropIfExists('artist_photos');
  }
