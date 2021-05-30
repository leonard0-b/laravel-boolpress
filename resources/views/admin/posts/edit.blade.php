@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Edit Post</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('admin.posts.update', ['post' => $post->id])}}" method="post" enctype="multipart/form-data">
            @csrf 
            @method('PATCH')
                <div class="form-group">
                    <label for="category">Categories</label>
                    <select class="form-control @error('category') is-invalid @enderror" id="category" name="category_id">
                        <option value="">Select</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{$category->id == old('category_id', $post->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('categories')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{old('title', $post->title)}}">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{old('content', $post->content)}}</textarea>
                    @error('content')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <img src="{{asset('storage/'.$post->img)}}" alt="">
                </div>
                <div class="form-group">
                    <label for="img">Img</label>
                    <input type="file" name="img" class="form-control-file @error('img') is-invalid @enderror" id="img">
                    @error('img')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Save Post</button>
            </form>
        </div>
    </div>
</div>
@endsection