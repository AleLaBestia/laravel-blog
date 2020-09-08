@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
                <div class="card">
                <img src="{{$post->image}}" class="card-img-top img-fluid" alt="">
                    <div class="card-body">
                      <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->body}}</p>
                    <a href="  " class="btn btn-primary">Go back</a>
                    </div>
                  </div>

 
          
        </div>
    </div>
</div>
@endsection
