@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('contact')}}" method="Post">
        @csrf
        @method('POST')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{old('name')}}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email" type="text" name="email" value="{{old('email')}}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="object">Object</label>
                    <input class="form-control @error('object') is-invalid @enderror" id="object" type="text" name="object" value="{{old('object')}}">
                    @error('object')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Message</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{old('content')}}</textarea>
                    @error('content')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
                <a class="btn btn-secondary" href="{{route('posts.index')}}">Home</a>
            </form>
        </div>
    </div>
@endsection