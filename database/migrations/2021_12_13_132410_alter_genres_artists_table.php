<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGenresArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('genres_artists', function (Blueprint $table) {
        $table->foreignId('genres_id')->constrained();
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
        Schema::table('genres_artists', function (Blueprint $table) {
          $table->dropForeign(['genres_id']);
          $table->dropColumn('genres_id');
      });
    }
}
