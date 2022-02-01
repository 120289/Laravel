<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('albums', function (Blueprint $table) {
        $table->foreignId('album_photo_id')->constrained();
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
      Schema::table('albums', function (Blueprint $table) {
        $table->dropForeign(['album_photo_id']);
        $table->dropColumn('album_photo_id');
});

    }
}
