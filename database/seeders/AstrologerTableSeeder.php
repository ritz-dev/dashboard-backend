<?php

namespace Database\Seeders;

use App\Models\Astrologer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AstrologerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Astrologer::factory()->count(10)->create();
    }
}
