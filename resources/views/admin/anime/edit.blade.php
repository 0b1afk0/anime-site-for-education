@extends('layouts.app')

@section('content')
<div class="container py-5">

<h3 style="color:#c95987;">Редактировать аниме</h3>

<form method="POST"
action="{{ route('admin.anime.update',$anime) }}">
@csrf
@method('PUT')

<div class="mb-3">
    <label class="form-label text-[#e8e8e8]">Название</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $anime->title ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label text-[#e8e8e8]">Оригинальное название</label>
    <input type="text" name="original_title" class="form-control" value="{{ old('original_title', $anime->original_title ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label text-[#e8e8e8]">Описание</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description', $anime->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label text-[#e8e8e8]">Изображение (URL)</label>
    <input type="text" name="image" class="form-control" value="{{ old('image', $anime->image ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label text-[#e8e8e8]">Жанры</label>
    <input type="text" name="genre" class="form-control" value="{{ old('genre', $anime->genre ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label text-[#e8e8e8]">Год выхода</label>
    <input type="number" name="year" class="form-control" value="{{ old('year', $anime->year ?? '') }}">
</div>

<button type="submit" class="btn" style="background-color:#903175; color:#e8e8e8;">Сохранить</button>
</form>

</div>
@endsection
