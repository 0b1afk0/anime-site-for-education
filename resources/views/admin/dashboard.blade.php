@extends('layouts.app')

@section('content')
<div class="container py-5">

<h2 style="color:#c95987;">Админ-панель</h2>

<div class="row mt-4 g-4">

<div class="col-md-4">
    <a href="{{ route('admin.anime.index') }}" class="card p-4 text-center text-decoration-none"
       style="background:#202529;border:1px solid #903175;color:#e8e8e8;">
        Аниме
    </a>
</div>

<div class="col-md-4">
    <a href="{{ route('admin.users.index') }}" class="card p-4 text-center text-decoration-none"
       style="background:#202529;border:1px solid #903175;color:#e8e8e8;">
        Пользователи
    </a>
</div>

<div class="col-md-4">
    <a href="{{ route('admin.watched.index') }}" class="card p-4 text-center text-decoration-none"
       style="background:#202529;border:1px solid #903175;color:#e8e8e8;">
        Просмотренные
    </a>
</div>

</div>
</div>
@endsection
