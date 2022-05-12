<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album_Artist;

class AlbumArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Album_Artist::factory()->times(5)->create();

    }
}
