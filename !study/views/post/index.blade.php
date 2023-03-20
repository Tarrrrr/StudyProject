{{--остальные данные берет из шаблона index--}}
@extends('layouts.index')
@section('content')
    {{--кнопка создания поста--}}
    <div>
        <a href="{{route('post.create')}}" class="btn btn-primary mb-3">Create post</a>
    </div>
    <div>
        {{--вывод всех заголовков постов, в виде ссылок с роутом на посты по id--}}
        @foreach($posts as $post)
            <div>{{$post->id}}. <a href="{{route('post.show', $post->id)}}">{{$post->title}}</a></div>
        @endforeach
    </div>
@endsection
