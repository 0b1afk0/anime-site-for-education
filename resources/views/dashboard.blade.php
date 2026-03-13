@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-[#c95987] mb-4">Админ панель</h2>

    <div class="list-group">
        <a href="{{ route('admin.anime.index') }}" class="list-group-item list-group-item-action">
            Управление аниме
        </a>
        <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action">
            Управление пользователями
        </a>
        <a href="{{ route('admin.watched_anime.index') }}" class="list-group-item list-group-item-action">
            Просмотренные аниме
        </a>
    </div>
</div>
@endsection
