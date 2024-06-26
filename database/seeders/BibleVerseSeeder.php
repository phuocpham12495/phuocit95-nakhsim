<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BibleVerse;

class BibleVerseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BibleVerse::factory(20)->create();
    }
}
