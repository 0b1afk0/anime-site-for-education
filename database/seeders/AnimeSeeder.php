<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anime;

class AnimeSeeder extends Seeder
{
    public function run(): void
    {
        Anime::create([
            'title' => 'Attack on Titan',
            'original_title' => 'Shingeki no Kyojin',
            'description' => 'Humans fight against giant humanoid creatures called Titans.',
            'image' => 'attack_on_titan.jpg',
            'genre' => 'Action, Drama, Fantasy',
            'year' => 2013,
        ]);

        Anime::create([
            'title' => 'Demon Slayer',
            'original_title' => 'Kimetsu no Yaiba',
            'description' => 'A boy fights demons to save his sister.',
            'image' => 'demon_slayer.jpg',
            'genre' => 'Action, Adventure, Fantasy',
            'year' => 2019,
        ]);

        Anime::create([
            'title' => 'One Piece',
            'original_title' => 'One Piece',
            'description' => 'A boy dreams to become the Pirate King.',
            'image' => 'one_piece.jpg',
            'genre' => 'Action, Adventure, Comedy',
            'year' => 1999,
        ]);
    }
}
