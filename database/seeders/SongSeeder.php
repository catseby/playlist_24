<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('songs')->insert([
            ['title' => 'Stcks & Stones', 'artist' => 'Bob123', 'genre' => "Rock"],
            ['title' => 'Chill Vibess', 'artist' => 'Relaxar', 'genre' => "Jazz"],
            ['title' => 'Notation', 'artist' => 'James Berret', 'genre' => "Pop"]
        ]);
    }
}
