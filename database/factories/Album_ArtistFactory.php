<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Album_ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'artist_id' => rand(1, 5),
          'album_id' => rand(1, 5),
        ];
    }
}
