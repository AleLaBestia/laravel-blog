@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card mb-3">
          <img src="{{$post->image}}" class="card-img-top img-fluid" alt="...">
 
            <div class="card-body">
              
            <h2 class="card-title m-3">{{$post->title}}</h2>
              <p class="card-text">{{$post->body}}</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
