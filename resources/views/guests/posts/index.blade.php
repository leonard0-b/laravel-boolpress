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
                <a href="{{route('posts.show', ['slug' => $post->slug])}}">{{$post->title}}</a>
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