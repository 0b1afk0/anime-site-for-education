@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="background-color: #202529; border: 1px solid #333; border-radius: 8px;">
                    <div class="card-header" style="background-color: #202529; color: #e8e8e8; border-bottom: 1px solid #333; padding: 20px;">
                        <h2 class="mb-0" style="color: #e8e8e8; font-weight: 600;">{{ $anime->title }}</h2>
                    </div>

                    <div class="card-body" style="color: #e8e8e8; padding: 30px;">
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="position-relative">
                                    <img src="{{ asset('images/' . basename($anime->image)) }}"
                                         alt="{{ $anime->title }}"
                                         class="img-fluid rounded"
                                         style="border: 1px solid #333; width: 100%; height: auto; max-height: 400px; object-fit: cover;">

                                    @auth
                                        @if($isWatched)
                                            <div class="position-absolute top-0 end-0 m-2">
                                                <span class="badge" style="background-color: #c95987; color: #e8e8e8; font-size: 0.875rem; padding: 6px 12px;">Просмотрено</span>
                                            </div>
                                        @endif
                                    @endauth
                                </div>

                                <div class="mt-3">
                                    @auth
                                        <form action="{{ route('anime.mark_watched', $anime->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit"
                                                    class="btn btn-block"
                                                    style="background-color: #c95987; color: #e8e8e8; border: none; border-radius: 6px; padding: 12px 24px; font-weight: 600; width: 100%;"
                                                    {{ $isWatched ? 'disabled' : '' }}>
                                                {{ $isWatched ? '✓ Просмотрено' : '✓ Отметить как просмотренное' }}
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}"
                                           class="btn btn-block"
                                           style="background-color: #c95987; color: #e8e8e8; border: none; border-radius: 6px; padding: 12px 24px; font-weight: 600; width: 100%;">
                                            ✓ Отметить как просмотренное
                                        </a>
                                    @endauth
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="anime-info">
                                    <div class="mb-4">
                                        <h5 style="color: #e8e8e8; font-weight: 600; margin-bottom: 15px; border-bottom: 1px solid #333; padding-bottom: 10px;">
                                            Информация
                                        </h5>

                                        <div class="row">
                                            <div class="col-md-6 mb-3" style="display: flex; align-items: center;">
                                                <strong style="color: #e8e8e8;">Жанр:</strong>
                                                @php
                                                    $genres = explode(',', $anime->genre);
                                                    $mainGenres = array_slice($genres, 0, 3);
                                                    $remainingGenres = array_slice($genres, 3);
                                                @endphp

                                                @if(count($remainingGenres) > 0)
                                                    <div class="dropdown" style="margin-left: 8px;">
                                                        <button class="btn dropdown-toggle"
                                                                type="button"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false"
                                                                style="background-color: #c95987; color: #e8e8e8; border: none; border-radius: 4px; padding: 4px 8px; font-size: 0.875rem;">
                                                            {{ implode(', ', $mainGenres) }}...
                                                        </button>
                                                        <ul class="dropdown-menu" style="background-color: #2a2a2a; border: 1px solid #333; border-radius: 4px;">
                                                            @foreach($genres as $genre)
                                                                <li style="padding: 4px 8px; border-bottom: 1px solid #333;">
                                                                    <span style="color: #e8e8e8; font-size: 0.875rem;">{{ trim($genre) }}</span>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @else
                                                    <span class="badge" style="background-color: #c95987; color: #e8e8e8; margin-left: 8px; padding: 4px 8px; font-size: 0.875rem;">
                                                        {{ $anime->genre }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <strong style="color: #e8e8e8;">Год выпуска:</strong>
                                                <span style="color: #e8e8e8; margin-left: 8px;">{{ $anime->year }}</span>
                                            </div>
                                            @if($anime->original_title)
                                                <div class="col-md-6 mb-3">
                                                    <strong style="color: #e8e8e8;">Оригинальное название:</strong>
                                                    <span style="color: #e8e8e8; margin-left: 8px;">{{ $anime->original_title }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h5 style="color: #e8e8e8; font-weight: 600; margin-bottom: 15px; border-bottom: 1px solid #333; padding-bottom: 10px;">
                                            Описание
                                        </h5>
                                        <p style="color: #e8e8e8; line-height: 1.6;">{{ $anime->description }}</p>
                                    </div>

                                    @auth
                                        <div class="mt-4 p-3" style="background-color: #2a2a2a; border-radius: 6px; border-left: 3px solid #c95987;">
                                            <h6 style="color: #e8e8e8; margin-bottom: 10px; font-weight: 600;">
                                                Ваш статус
                                            </h6>
                                            <p style="color: #e8e8e8; margin-bottom: 0; font-size: 0.95rem;">
                                                @if($isWatched)
                                                    <span class="badge" style="background-color: #c95987; color: #e8e8e8; padding: 4px 8px;">Это аниме уже добавлено в ваш список просмотренных</span>
                                                @else
                                                    <span class="badge" style="background-color: #903175; color: #e8e8e8; padding: 4px 8px;">Это аниме еще не добавлено в ваш список просмотренных</span>
                                                @endif
                                            </p>
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>

                        <!-- Плеер Kodik -->
                        @if($anime->player_url)
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <h5 style="color: #e8e8e8; font-weight: 600; margin-bottom: 15px; border-bottom: 1px solid #333; padding-bottom: 10px;">
                                            Плеер
                                        </h5>
                                        <div class="player-container" style="background-color: #2a2a2a; border-radius: 8px; padding: 15px; border: 1px solid #333;">
                                            <iframe
                                                src="{{ $anime->player_url }}"
                                                width="100%"
                                                height="500"
                                                frameborder="0"
                                                allowfullscreen
                                                style="border-radius: 4px;">
                                            </iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            transition: none;
        }

        .btn:hover {
            background-color: #903175 !important;
            transform: none;
            box-shadow: none;
        }

        .badge {
            font-size: 0.875rem;
            padding: 4px 8px;
            border-radius: 4px;
        }

        .anime-info h5 {
            font-size: 1.1rem;
        }

        .anime-info p {
            font-size: 0.95rem;
            color: #e8e8e8;
            line-height: 1.6;
        }

        .position-relative:hover img {
            transform: none;
            transition: none;
        }
    </style>
@endsection
