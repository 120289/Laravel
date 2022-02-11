<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterArtistAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::rename('artist_albums', 'album_artist');
      Schema::table('album_artist', function (Blueprint $table) {
        $table->foreignId('artist_id')->constrained();
        $table->foreignId('album_id')->constrained();
      }
    );
  }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
      {
        Schema::table('album_artist', function (Blueprint $table) {
          $table->dropForeign(['album_id']);
          $table->dropForeign(['artist_id']);
          $table->dropColumn('album_id');
          $table->dropColumn('artist_id');
      });
    }
}
