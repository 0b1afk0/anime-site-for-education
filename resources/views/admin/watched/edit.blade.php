@extends('layouts.app')

@section('content')
<div class="container py-5">

<h3 style="color:#c95987;">Редактировать просмотренное аниме</h3>

<form method="POST" action="{{ route('admin.watched.update',$watched) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label text-[#e8e8e8]">Пользователь</label>
        <select name="user_id" class="form-control">
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id', $watched->user_id) == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label text-[#e8e8e8]">Аниме</label>
        <select name="anime_id" class="form-control">
            @foreach($animes as $item)
                <option value="{{ $item->id }}" {{ old('anime_id', $watched->anime_id) == $item->id ? 'selected' : '' }}>
                    {{ $item->title }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn" style="background-color:#903175; color:#e8e8e8;">Сохранить</button>
</form>

</div>
@endsection
