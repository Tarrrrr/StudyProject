{{--остальные данные берет из шаблона index--}}
@extends('layouts.index')
@section('content')
    {{--вывод поста в виде заголовок, текст и лайки--}}
    <div>
            <div>{{$post->title}}</div>
            <div>{{$post->content}}</div>
            <div>{{$post->likes}}</div>
    </div>
    <div>
        <form action="{{ route('post.delete', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Delete" class="btn btn-danger mb-3">
        </form>
    </div>
    <div>
        {{--реализация кнопки назад изменения поста--}}
        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
        {{--реализация кнопки назад по роуту на начальную страницу--}}
        <a href="{{route('post.index')}}" class="btn btn-secondary">Back</a>
    </div>
@endsection
