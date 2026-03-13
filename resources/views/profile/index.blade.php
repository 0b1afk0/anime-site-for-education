@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="card mx-auto"
         style="max-width:500px; background:#202529; border:1px solid #903175;">

        <div class="card-body text-center">

            <h3 style="color:#c95987;">Профиль</h3>

            <p class="mt-3" style="color:#e8e8e8;">
                <strong>Имя:</strong> {{ $user->name }}
            </p>

            <p style="color:#e8e8e8;">
                <strong>Email:</strong> {{ $user->email }}
            </p>

            <div class="d-flex flex-column gap-3 mt-4">

                <a href="{{ route('watched.index') }}"
                   class="btn"
                   style="background:#c95987;color:#e8e8e8;font-weight:600;">
                    Просмотренные аниме
                </a>

                @if($user->is_admin)
                    <a href="{{ route('admin.dashboard') }}"
                       class="btn"
                       style="background:#c95987;color:#e8e8e8;font-weight:600;">
                        Админ-панель
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn w-100" style="background:#903175; color:#e8e8e8; font-weight:600;">
                        Выйти
                    </button>
                </form>

            </div>

        </div>
    </div>

</div>
@endsection
