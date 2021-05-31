@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{route('admin.tags.create')}}">Add New Tag</a>
        </div>
    </div>
    <div class="row justify-content-center">
    @foreach ($tags as $tag)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                <a href="{{route('admin.tags.show', ['tag' => $tag->id])}}">{{$tag->name}}</a>
                </div>
                <div class="card-body">
                    <div>
                        <a href="{{route('admin.tags.edit', ['tag' => $tag->id])}}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>

@endsection