<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchedAnime extends Model
{
    use HasFactory;

    // Явно указываем имя таблицы
    protected $table = 'watched_anime';

    protected $fillable = [
        'user_id',
        'anime_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function anime()
    {
        return $this->belongsTo(Anime::class);
    }
}
