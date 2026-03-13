<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('anime', function (Blueprint $table) {
        $table->id();
        $table->string('title');              // название аниме
        $table->string('original_title')->nullable(); // оригинальное название
        $table->text('description')->nullable();     // описание
        $table->string('image')->nullable();         // путь к картинке
        $table->string('genre')->nullable();         // жанры (потом можно сделать отдельную таблицу)
        $table->integer('year')->nullable();         // год выхода
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anime');
    }
};
