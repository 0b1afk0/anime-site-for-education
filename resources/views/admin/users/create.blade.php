@extends('layouts.app')

@section('content')
<div class="container py-5">

<h3 style="color:#c95987;">Добавить пользователя</h3>

<form method="POST" action="{{ route('admin.users.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label text-[#e8e8e8]">Имя</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label class="form-label text-[#e8e8e8]">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="mb-3">
        <label class="form-label text-[#e8e8e8]">Пароль</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label text-[#e8e8e8]">Повторите пароль</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}>
        <label class="form-check-label text-[#e8e8e8]">Админ?</label>
    </div>

    <button type="submit" class="btn" style="background-color:#903175; color:#e8e8e8;">Сохранить</button>
</form>

</div>
@endsection
