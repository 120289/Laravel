<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropPathFromArtistphotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2021_12_07_142109_create_artist_photos_table.php
        Schema::create('artist_photos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
=======
        Schema::table('artist_photos', function (Blueprint $table) {
            $table->dropColumn('photo_directory');
>>>>>>> remotes/origin/photo-upload:database/migrations/2022_02_05_195432_drop_path_from_artistphotos_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD:database/migrations/2021_12_07_142109_create_artist_photos_table.php
        Schema::dropIfExists('artist_photos');
=======
        Schema::table('artist_photos', function (Blueprint $table) {
            //
        });
>>>>>>> remotes/origin/photo-upload:database/migrations/2022_02_05_195432_drop_path_from_artistphotos_table.php
    }
}
