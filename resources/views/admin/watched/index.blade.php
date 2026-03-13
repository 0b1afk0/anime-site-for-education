@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h3 style="color:#c95987;">Просмотренные аниме</h3>

    <a href="{{ route('admin.watched.create') }}"
       class="btn mb-3"
       style="background:#903175;color:#e8e8e8;">
       Добавить запись
    </a>

    <table class="table table-dark table-striped">

        <tr>
            <th>ID</th>
            <th>Пользователь</th>
            <th>Аниме</th>
            <th>Дата</th>
            <th>Действия</th>
        </tr>

        @foreach($watched as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->user->name ?? '—' }}</td>
            <td>{{ $item->anime->title ?? '—' }}</td>
            <td>{{ $item->created_at }}</td>
            <td>

                <a href="{{ route('admin.watched.edit',$item) }}"
                   class="btn btn-sm btn-warning">✏</a>

                <form method="POST"
                      action="{{ route('admin.watched.destroy',$item) }}"
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
