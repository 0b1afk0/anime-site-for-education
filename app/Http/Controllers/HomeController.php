<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;

class HomeController extends Controller
{
    public function index()
    {
        $animes = Anime::all(); // пока выводим все аниме без фильтров

        return view('home', compact('animes'));
    }
}
