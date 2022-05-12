<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;

class ArtistSeeder extends Seeder {

    public function run()
    {
        Artist::factory()->times(5)
        ->create();
    }
}
