@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                <h2>{{$post->title}}</h2>
                @if ($post->category)
                <a href="{{route('category.index', ['slug' => $post->category->slug])}}"><h5>{{$post->category->name}}</h5></a>
                @endif
                </div>
                <div class="card-body">
                    {{$post->content}}
                </div>
            </div>
            <a class="btn btn-dark" href="{{route('posts.index')}}">Home</a>
        </div>
    </div>
</div>

@endsection