@extends('layouts.app')

@section('content')
<div class="container py-5">

<h3 style="color:#c95987;">Пользователи</h3>

<a href="{{ route('admin.users.create') }}"
class="btn mb-3"
style="background:#903175;color:#e8e8e8;">
Добавить пользователя
</a>

<table class="table table-dark table-striped">
<tr>
<th>ID</th>
<th>Имя</th>
<th>Email</th>
<th>Админ?</th>
<th>Действия</th>
</tr>

@foreach($users as $user)
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->is_admin ? 'Да' : 'Нет' }}</td>
<td>

<a href="{{ route('admin.users.edit',$user) }}"
class="btn btn-sm btn-warning">✏</a>

<form method="POST"
action="{{ route('admin.users.destroy',$user) }}"
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
