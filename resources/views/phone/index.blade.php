@extends('layouts.main') {{--Включение шаблона мейн--}}
@section('base') {{--Определении секции для переноса в мейн--}}
    <div class="mx-4">
        {{--кнопка создания запись телефона--}}
        <a class="btn btn-primary mb-3" href="{{ route('phones.create') }}">Добавить контакт</a>
        <h5>Ваши контакты:</h5>
        {{--$phones вызывается из контроллера, функции индекс и определяется как фоун--}}
        @foreach($phones as $phone)
            {{--из фоун мы забираем данные из бд - ид и имя--}}
            {{--а делает запись кликабельной, переходит на карточку контакта и выводит id в http--}}
            <div>- <a href="{{ route('phones.show', $phone->id) }}">{{ $phone->name }}</a></div>
        @endforeach
    </div>
@endsection
