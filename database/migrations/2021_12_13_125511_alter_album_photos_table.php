<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAlbumPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('album_photos', function (Blueprint $table) {
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
        Schema::table('album_photos', function (Blueprint $table) {
          $table->dropForeign(['album_id']);
          $table->dropColumn('album_id');
      });
    }
}
