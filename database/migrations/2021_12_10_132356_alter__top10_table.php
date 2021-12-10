<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTop10Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('top10', function (Blueprint $table) {
        $table->foreignId('artists_albums_id')->constrained();
        $table->foreignId('users_id')->constrained();
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
        Schema::table('top10', function (Blueprint $table) {
          $table->dropForeign(['users_id']);
          $table->dropForeign(['artist_albums_id']);
          $table->dropColumn('users_id');
          $table->dropColumn('artist_albums_id');
      });
    }
}
