@extends('layouts.main') {{--Включение шаблона мейн--}}
@section('base') {{--Определении секции для переноса в мейн--}}
    {{--вывод карточки контакта--}}
    <div class="mx-4">
        <h5>Контакт:</h5>
    </div>
    <ul class="list ms-0">
        <ul class="list-unstyled">
            <li>{{ $phone->name }}</li>
            <li>{{ $phone->phone }}</li>
            <li>{{ $phone->address }}</li>
            <li>{{ $phone->birthday }}</li>
            <li>{{ $phone->country }}</li>
        </ul>
    </ul>
    <div class="mx-4">
        <a class="btn btn-primary" href="{{ route('phoneBaseViews.edit', $phone->id)}}">Обновить контакт</a>
        {{--реализация кнопки удаления через форму (html не поддерживает delete)--}}
        <form class="d-inline" action="{{ route('phoneBaseViews.delete', $phone->id)}}" method="post">
            @csrf
            @method('delete')
            <input class="btn btn-danger" type="submit" value="Удалить контакт">
        </form>
        <a class="btn btn-secondary" href="{{ route('phoneBaseViews.index') }}">Назад</a>
    </div>
@endsection
