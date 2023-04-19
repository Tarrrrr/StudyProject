@extends('layouts.main') {{--Включение шаблона мейн--}}
@section('base') {{--Определении секции для переноса в мейн--}}
{{--передача данных из формы в роут стор -> затем отображение во вью мейн--}}
<form class="mx-4" action="{{ route('phoneBaseViews.update', $phone->id) }}" method="post">
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
    <div class="mb-3">
        <label for="category" class="form-label">Категория</label>
        <select class="form-select" name="category_id" id="category" aria-label="Default select example">
            @foreach($categories as $category)
                {{--cравниваем id категории и id категории и посте, возвращаем параметр селектед тому, который прописан в базе--}}
                <option {{ $category->id === $phone->category->id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        @foreach($tags as $tag)
            <div class="form-check">
                {{--прописать в инпуте нейм, а то не будет отдавать данные ([]-значит, что передается несколько значений)--}}
                <input class="form-check-input" name="tags[]" type="checkbox"
                    @foreach($phone->tags as $phoneTag)
                        {{ $tag->id === $phoneTag->id ? 'checked' : ''}}
                    @endforeach
                    value="{{ $tag->id }}" id="{{ $tag->id }}">
                <label class="form-check-label" for="{{ $tag->id }}">
                    {{ $tag->tag }}
                </label>
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Обновить контакт</button>
    <a class="btn btn-secondary mx-2" href="{{ route('phoneBaseViews.index') }}">Назад</a>
</form>
@endsection
