@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4" style="color:#c95987;">Аниме Тайтлы</h1>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @foreach($animes as $anime)
                <div class="col">
                    <a href="{{ route('anime.show', $anime->id) }}" style="text-decoration: none;">
                        <div class="card h-100 shadow-sm" style="max-width:300px">
                            <img src="{{ asset('images/' . $anime->image) }}" class="card-img-top" alt="{{ $anime->title }}"
                                style="max-height: 400px; max-width:300px">
                            <div class="card-body">
                                <h5 class="card-title"><strong>{{ $anime->title }}</strong></h5>
                                <p class="card-text">{{ Str::limit($anime->description, 50) }}</p>
                                <p class="card-subtitle"><strong>{{ Str::limit($anime->genre, 20) }} |
                                        {{ $anime->year }}</strong></p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
