@extends('layouts.main') {{--Включение шаблона мейн--}}
@section('base') {{--Определении секции для переноса в мейн--}}
{{--передача данных из формы в роут стор -> затем отображение во вью мейн--}}
<form class="mx-4" action="{{ route('phones.update', $phone->id) }}" method="post">
    {{--защитник формы, чтобы не было ошибки 419--}}
    @csrf
    {{--в html нет метода изменения данных добавляем через laravel--}}
    @method('patch')
    <div class="mb-3">
        <label for="name" class="form-label">Имя</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя" value="{{ $phone->name }}">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Телефон</label>
        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Введите телефон" value="{{ $phone->phone }}">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Адрес</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Введите адрес" value="{{ $phone->address }}">
    </div>
    <div class="mb-3">
        <label for="birthday" class="form-label">День рождения</label>
        <input type="date" class="form-control" name="birthday" id="birthday" placeholder="Введите день рождения" value="{{ $phone->birthday }}">
    </div>
    <div class="mb-3">
        <label for="country" class="form-label">Страна</label>
        <input type="text" class="form-control" name="country" id="country" placeholder="Введите страну" value="{{ $phone->country }}">
    </div>
    <button type="submit" class="btn btn-primary">Обновить контакт</button>
    <a class="btn btn-secondary mx-2" href="{{ route('phones.index') }}">Назад</a>
</form>
@endsection
