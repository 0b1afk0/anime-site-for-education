<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\WatchedAnime;
use Illuminate\Support\Facades\Auth;
use App\Services\KodikService;

class AnimeController extends Controller
{
    public function show($id, KodikService $kodik)
    {
        $anime = Anime::findOrFail($id);

        // Проверяем, добавлено ли аниме в просмотренные текущим пользователем
        $isWatched = false;
        if (Auth::check()) {
            $isWatched = WatchedAnime::where('user_id', Auth::id())
                ->where('anime_id', $anime->id)
                ->exists();
        }

        // Получаем ссылку на плеер через Kodik
        if (!$anime->player_url) {
            $result = $kodik->search($anime->title);
            $anime->player_url = $result['player_url'];
            $anime->save();
        }

        return view('anime.show', compact('anime', 'isWatched'));
    }

    public function markAsWatched(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Для добавления в просмотренные необходимо авторизоваться');
        }

        $anime = Anime::findOrFail($id);

        // Проверяем, не добавлено ли уже аниме в просмотренные
        $existing = WatchedAnime::where('user_id', Auth::id())
            ->where('anime_id', $anime->id)
            ->first();

        if (!$existing) {
            WatchedAnime::create([
                'user_id' => Auth::id(),
                'anime_id' => $anime->id,
            ]);

            return redirect()->back()->with('success', 'Аниме добавлено в просмотренные!');
        }

        return redirect()->back()->with('info', 'Аниме уже добавлено в просмотренные');
    }
}
