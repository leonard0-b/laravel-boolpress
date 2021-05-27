@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                <h2>{{$post->title}}</h2>
                </div>
                <div class="card-body">
                    {{$post->content}}
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
        </div>
    </div>
</div>

@endsection