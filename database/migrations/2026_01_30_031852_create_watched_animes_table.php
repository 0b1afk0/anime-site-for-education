<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // проверяем, есть ли таблица, чтобы не создавать её заново
        if (!Schema::hasTable('watched_anime')) {
            Schema::create('watched_anime', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');  // ссылка на пользователя
                $table->foreignId('anime_id')->constrained('anime')->onDelete('cascade'); // ссылка на аниме
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('watched_anime');
    }
};
