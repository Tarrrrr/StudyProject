{{--остальные данные берет из шаблона index--}}
@extends('layouts.index')
@section('content')
<body>
    {{--вывод верхнего меню средствами bootstrap (на сайте бутстрап примеры)--}}
    <form action="{{ route('post.store') }}" method="post">
        {{--защита сайта--}}
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="content" placeholder="Content"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name="image" class="form-control" id="image" placeholder="Image">
        </div>
        <div class="mb-3">
            <label for="likes" class="form-label">Likes</label>
            <input type="number" name="likes" class="form-control" id="likes" placeholder="Likes">
        </div>
        <button type="submit" class="btn btn-success">Create</button>
        {{--кнопка бек, если не хочещь создавать пост--}}
        <a href="{{route('post.index')}}" class="btn btn-secondary">Back</a>
    </form>
@endsection
