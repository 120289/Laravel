<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterArtistAlbumTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::rename('artist_albums', 'album_artist');
      }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
      {
        Schema::rename('album_artist', 'artist_albums');
      }
  }
