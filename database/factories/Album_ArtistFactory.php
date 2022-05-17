<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class Album_ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      $minArtist = DB::table('artists')->min('id');
      $maxArtist = DB::table('artists')->max('id');
      $minAlbum = DB::table('albums')->min('id');
      $maxAlbum = DB::table('albums')->max('id');

        return [
          'artist_id' => rand($minArtist, $maxArtist),
          'album_id' => rand($minAlbum, $maxAlbum),
        ];
    }
}
