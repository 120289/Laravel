<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('songs', function (Blueprint $table) {
        $table->foreignId('artist_albums_id')->constrained();
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
        Schema::table('songs', function (Blueprint $table) {
          $table->dropForeign(['artist_albums_id']);
          $table->dropColumn('artist_albums_id');
      });
    }
}
