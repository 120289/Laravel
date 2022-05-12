<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
      $this->call(ArtistSeeder::class);
      $this->call(AlbumSeeder::class);
      $this->call(AlbumArtistSeeder::class);

      }
}
