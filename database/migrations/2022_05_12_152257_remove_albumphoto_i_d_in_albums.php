<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveAlbumphotoIDInAlbums extends Migration
{

    public function up()
    {
        Schema::table('albums', function (Blueprint $table) {
          $table->dropForeign(['album_photo_id']);
          $table->dropColumn('album_photo_id');
        });
    }

    public function down()
    {
        Schema::table('albums', function (Blueprint $table) {
            //
        });
    }
}
