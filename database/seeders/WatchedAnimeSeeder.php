<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Anime;

class WatchedAnimeSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'user@example.com')->first();
        $anime1 = Anime::where('title', 'Attack on Titan')->first();
        $anime2 = Anime::where('title', 'Demon Slayer')->first();

        if ($user && $anime1) {
            $user->watchedAnime()->attach($anime1->id);
        }
        if ($user && $anime2) {
            $user->watchedAnime()->attach($anime2->id);
        }
    }
}
