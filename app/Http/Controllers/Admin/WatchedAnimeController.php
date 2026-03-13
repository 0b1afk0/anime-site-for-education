<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WatchedAnime;
use App\Models\User;
use App\Models\Anime;

class WatchedAnimeController extends Controller
{
    public function index()
    {
        $watched = WatchedAnime::with(['user', 'anime'])->get();
        return view('admin.watched.index', compact('watched'));
    }

    public function create()
    {
        $users = User::all();
        $animes = Anime::all();
        return view('admin.watched.create', compact('users', 'animes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'anime_id' => 'required|exists:anime,id',
        ]);

        WatchedAnime::create($request->all());

        return redirect()->route('admin.watched.index');
    }

    public function edit(WatchedAnime $watched)
    {
        $users = User::all();
        $animes = Anime::all();
        return view('admin.watched.edit', compact('watched', 'users', 'animes'));
    }

    public function update(Request $request, WatchedAnime $watched)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'anime_id' => 'required|exists:anime,id',
        ]);

        $watched->update($request->all());

        return redirect()->route('admin.watched.index');
    }

    public function destroy(WatchedAnime $watched)
    {
        $watched->delete();
        return redirect()->route('admin.watched.index');
    }
}
