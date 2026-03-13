@extends('layouts.app')

@section('content')
<div class="container py-5">

<h3 style="color:#c95987;">Аниме</h3>

<a href="{{ route('admin.anime.create') }}"
class="btn mb-3"
style="background:#903175;color:#e8e8e8;">
Добавить аниме
</a>

<table class="table table-dark table-striped">

<tr>
<th>ID</th>
<th>Название</th>
<th>Действия</th>
</tr>

@foreach($anime as $item)
<tr>
<td>{{ $item->id }}</td>
<td>{{ $item->title }}</td>
<td>

<a href="{{ route('admin.anime.edit',$item) }}"
class="btn btn-sm btn-warning">✏</a>

<form method="POST"
action="{{ route('admin.anime.destroy',$item) }}"
style="display:inline;">
@csrf
@method('DELETE')
<button class="btn btn-sm btn-danger">🗑</button>
</form>

</td>
</tr>
@endforeach

</table>

</div>
@endsection
