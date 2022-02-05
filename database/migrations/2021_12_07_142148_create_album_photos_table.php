<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumPhotosTable extends Migration{

    public function up()
    {
        Schema::create('album_photos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->String("photo_name");
        });
    }
    public function down()
    {
        Schema::dropIfExists('album_photos');
    }
}
