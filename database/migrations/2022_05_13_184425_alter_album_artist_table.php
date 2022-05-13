<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAlbumArtistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
      Schema::table('album_artist', function (Blueprint $table) {
        $table->foreignId('artist_id')->constrained();
        $table->foreignId('album_id')->constrained();
    });
  }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
      Schema::table('album_artist', function (Blueprint $table) {
         $table->dropForeign(['artist_id']);
         $table->dropForeign(['album_id']);
    });
  }
}
