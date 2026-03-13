<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\Admin\WatchedAnimeController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Вход
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Регистрация
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Выход
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Профиль

Route::get('/profile', [ProfileController::class, 'index'])
    ->middleware('auth')
    ->name('profile');

Route::get('/watched', function () {
    return 'Здесь будут просмотренные аниме';
})->name('watched.index');

//Админка
Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('anime', \App\Http\Controllers\Admin\AnimeController::class)->names('anime');
        Route::resource('users', UserController::class)->names('users');
        Route::resource('watched', WatchedAnimeController::class)->names('watched');
    });

//Страница аниме
Route::get('/anime/{id}', [AnimeController::class, 'show'])->name('anime.show');
Route::post('/anime/{id}/watched', [AnimeController::class, 'markAsWatched'])->name('anime.mark_watched');


