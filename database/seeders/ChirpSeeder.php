<?php

namespace Database\Seeders;

use App\Models\Chirp;
use Illuminate\Database\Seeder;

class ChirpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chirp::factory()
            ->count(20)
            ->create();
    }
}
