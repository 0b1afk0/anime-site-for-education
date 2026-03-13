<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function index()
    {
        return view('admin.anime.index',[
            'anime' => Anime::all()
        ]);
    }

    public function create()
    {
        return view('admin.anime.create');
    }

    public function store(Request $request)
    {
        Anime::create($request->all());
        return redirect()->route('admin.anime.index');
    }

    public function edit(Anime $anime)
    {
        return view('admin.anime.edit', compact('anime'));
    }

    public function update(Request $request, Anime $anime)
    {
        $anime->update($request->all());
        return redirect()->route('admin.anime.index');
    }

    public function destroy(Anime $anime)
    {
        $anime->delete();
        return back();
    }
}
