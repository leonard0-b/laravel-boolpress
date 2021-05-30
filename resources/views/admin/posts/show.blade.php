@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                <h2>{{$post->title}}</h2>
                @if ($post->category)
                <h5>{{$post->category->name}}</h5>
                @endif
                </div>
                <div class="card-body">
                    {{$post->content}}
                    <img src="{{asset('storage/'.$post->img}}" alt="{{$post->title}}">
                    <div>
                        <a href="{{route('admin.posts.edit', ['post' => $post->id])}}">Edit</a>
                    </div>
                </div>
            </div>
            <div class="delete">
                <form action="{{route('admin.posts.destroy', ['post' => $post->id])}}" method='post'>
                @csrf
                @method('DELETE')
                <input class="btn btn-danger " onclick="return confirm('Are you sure?')" type="submit" name='Delete :(' value='Delete :('>
                </form>
            </div> 
            <a class="btn btn-dark" href="{{route('admin.posts.index')}}">Home</a>
        </div>
    </div>
</div>

@endsection