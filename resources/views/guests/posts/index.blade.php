@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    </div>
    <div class="row justify-content-center">
    @foreach ($posts as $post)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                <a href="{{route('posts.show', ['slug' => $post->slug])}}"><h2>{{$post->title}}</h2></a>
                <a href="{{route('category.index', ['slug' => $post->category->slug])}}"><h5>{{$post->category->name}}</h5></a>
                </div>
                <div class="card-body">
                    {{$post->content}}
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>

@endsection