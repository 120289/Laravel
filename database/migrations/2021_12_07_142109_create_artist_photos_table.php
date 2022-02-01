<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistPhotosTable extends Migration{

    public function up()
    {
        Schema::create('artist_photos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->String("photo_name");
            $table->String ("photo_directory");
        });
    }
    public function down(){
        Schema::dropIfExists('artist_photos');
  }
}
