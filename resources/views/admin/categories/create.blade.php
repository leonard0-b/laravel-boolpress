@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Add Category</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('admin.categories.store')}}" method="post">
            @csrf 
            @method('POST')
               
                <div class="form-group">
                    <label for="title">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{old('name')}}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Add Category</button>
            </form>
        </div>
    </div>
</div>
@endsection