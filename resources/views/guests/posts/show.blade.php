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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection