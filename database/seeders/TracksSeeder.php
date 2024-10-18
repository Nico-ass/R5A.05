<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Track;

class TracksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Track::factory()->count(50)->create();
    }
}
