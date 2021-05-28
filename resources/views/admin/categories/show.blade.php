@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                <h5>{{$category->name}}</h5>
                </div>
                <div class="card-body">
                    <div>
                        <a href="{{route('admin.categories.edit', ['category' => $category->id])}}">Edit</a>
                    </div>
                </div>
            </div>
            <div class="delete">
                <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method='post'>
                @csrf
                @method('DELETE')
                <input class="btn btn-danger " onclick="return confirm('Are you sure?')" type="submit" name='Delete :(' value='Delete :('>
                </form>
            </div> 
            <a class="btn btn-dark" href="{{route('admin.categories.index')}}">Home</a>
        </div>
    </div>
</div>

@endsection