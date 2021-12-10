<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterYoutubeVidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('youtube_vids', function (Blueprint $table) {
        $table->foreignId('artists_id')->constrained();
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
        Schema::table('youtube_vids', function (Blueprint $table) {
          $table->dropForeign(['artist_id']);
          $table->dropColumn('artist_id');
      });
    }
}
