<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    protected $table = 'anime'; // указываем явную таблицу

    protected $fillable = [
        'title',
        'original_title',
        'description',
        'image',
        'genre',
        'year',
        'player_url',
    ];

    // Связь с пользователями, которые посмотрели аниме
    public function users()
    {
        return $this->belongsToMany(User::class, 'watched_anime');
    }
}
