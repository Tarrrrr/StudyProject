@extends('layouts.main') {{--Включение шаблона мейн--}}
@section('base') {{--Определении секции для переноса в мейн--}}
{{--передача данных из формы в роут стор -> затем отображение во вью мейн--}}
<form class="mx-4" action="{{ route('phoneBaseViews.store') }}" method="post">
    {{--защитник формы, чтобы не было ошибки 419--}}
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Имя</label>
        {{--валью собирает старое значение и подставляет в поле если ошибка по другому полю--}}
        <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя" value="{{ old('name') }}">
        {{--ошибка введите данные при отправке пустой строки--}}
        @error('name')
            <p class="text-danger"> {{ $message }} </p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Телефон</label>
        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Введите телефон" value="{{ old('phoneBaseViews') }}">
        {{--ошибка введите данные при отправке пустой строки--}}
        @error('phoneBaseViews')
        <p class="text-danger"> {{ $message }} </p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Адрес</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Введите адрес" value="{{ old('address') }}">
        {{--ошибка введите данные при отправке пустой строки--}}
        @error('address')
        <p class="text-danger"> {{ $message }} </p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="birthday" class="form-label">День рождения</label>
        <input type="date" class="form-control" name="birthday" id="birthday" placeholder="Введите день рождения" value="{{ old('birthdate') }}">
        {{--ошибка введите данные при отправке пустой строки--}}
        @error('birthday')
        <p class="text-danger"> {{ $message }} </p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="country" class="form-label">Страна</label>
        <input type="text" class="form-control" name="country" id="country" placeholder="Введите страну" value="{{ old('country') }}">
        {{--ошибка введите данные при отправке пустой строки--}}
        @error('country')
        <p class="text-danger"> {{ $message }} </p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Категория</label>
        <select class="form-select" name="category_id" id="category" aria-label="Default select example">
            @foreach($categories as $category)
                <option
                    {{--оставляем выбранной значение, если ошибка в форме--}}
                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                    value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        @foreach($tags as $tag)
        <div class="form-check">
            {{--прописать в инпуте нейм, а то не будет отдавать данные ([]-значит, что передается несколько значений)--}}
            <input class="form-check-input" name="tags[]" type="checkbox" value="{{ $tag->id }}" id="{{ $tag->id }}">
            <label class="form-check-label" for="{{ $tag->id }}">
                {{ $tag->tag }}
            </label>
        </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Добавить контакт</button>
    <a class="btn btn-secondary" href="{{ route('phoneBaseViews.index') }}">Назад</a>
</form>
@endsection
