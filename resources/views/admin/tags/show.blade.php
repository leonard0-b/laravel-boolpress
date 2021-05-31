@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                <h5>{{$tag->name}}</h5>
                </div>
                <div class="card-body">
                    <div>
                        <a href="{{route('admin.tags.edit', ['tag' => $tag->id])}}">Edit</a>
                    </div>
                </div>
            </div>
            <div class="delete">
                <form action="{{route('admin.tags.destroy', ['tag' => $tag->id])}}" method='post'>
                @csrf
                @method('DELETE')
                <input class="btn btn-danger " onclick="return confirm('Are you sure?')" type="submit" name='Delete :(' value='Delete :('>
                </form>
            </div> 
            <a class="btn btn-dark" href="{{route('admin.tags.index')}}">Home</a>
        </div>
    </div>
</div>

@endsection