@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.categories.create')}}">Add New Category</a>
        </div>
    </div>
    <div class="row justify-content-center">
    @foreach ($categories as $category)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                <a href="{{route('admin.categories.show', ['category' => $category->id])}}">{{$category->name}}</a>
                </div>
                <div class="card-body">
                    <div>
                        <a href="{{route('admin.categories.edit', ['category' => $category->id])}}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>

@endsection