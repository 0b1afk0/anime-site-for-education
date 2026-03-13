@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="background-color:#202529; border:1px solid #903175;">
                <div class="card-body">
                    <h3 class="card-title text-[#c95987] mb-4">Регистрация</h3>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Имя --}}
                        <div class="mb-3">
                            <label class="form-label" style="color:#e8e8e8; font-weight:600">
                                Имя
                            </label>
                            <input type="text"
                                   class="form-control"
                                   name="name"
                                   value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label" style="color:#e8e8e8; font-weight:600">
                                Email
                            </label>
                            <input type="email"
                                   class="form-control"
                                   name="email"
                                   value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Пароль --}}
                        <div class="mb-3">
                            <label class="form-label" style="color:#e8e8e8; font-weight:600">
                                Пароль
                            </label>
                            <input type="password"
                                   class="form-control"
                                   name="password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Подтверждение пароля --}}
                        <div class="mb-3">
                            <label class="form-label" style="color:#e8e8e8; font-weight:600">
                                Повторите пароль
                            </label>
                            <input type="password"
                                   class="form-control"
                                   name="password_confirmation">
                        </div>

                        {{-- Кнопки --}}
                        <div class="d-flex justify-content-around align-items-center mt-4">
                            <button type="submit"
                                    class="btn"
                                    style="background-color:#c95987; color:#e8e8e8; padding:0.5rem 1.5rem; width:40%">
                                Зарегистрироваться
                            </button>

                            <a href="{{ route('login') }}"
                               class="btn"
                               style="background-color:#903175; color:#e8e8e8; padding:0.5rem 1.5rem; width:40%">
                                Войти
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
