{{--остальные данные берет из шаблона index--}}
@extends('layouts.index')
@section('content')
    <body>
    {{--вывод верхнего меню средствами bootstrap (на сайте бутстрап примеры)--}}
    <form action="{{ route('post.update', $post->id) }}" method="post">
        {{--защита сайта--}}
        @csrf
        {{--добавление метода через ларавел, так как в хтмл только пост и гет--}}
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                   value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="content"
                      placeholder="Content">{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name="image" class="form-control" id="image" placeholder="Image"
                   value="{{ $post->image }}">
        </div>
        <div class="mb-3">
            <label for="likes" class="form-label">Likes</label>
            <input type="number" name="likes" class="form-control" id="likes" placeholder="Likes"
                   value="{{ $post->likes }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        {{--кнопка бек, если не хочешь создавать пост--}}
        <a href="{{route('post.index')}}" class="btn btn-secondary">Back</a>
    </form>
@endsection
