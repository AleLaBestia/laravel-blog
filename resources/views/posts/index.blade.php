@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="{{route('posts.create')}}" class="btn btn-success mb-2">
            Create Post</a>
            <div class="card">
                @if(Session::has('message'))
                   <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif

                <div class="card-header">Post List</div>
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Title</th>                        
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach ($posts as $post)
                        <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td><img src="{{$post->image}}" width="50" height="50"/></td>
                        <td class="d-flex">
                            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-success mr-2">
                                Edit</a>
                            <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm
                                ('do u wanna delete?')">Delete</button>
                        
                            </form>  
                        </td>     
                         </tr>
                        @endforeach
                    </tbody>   
                  </table>
                </div>
            </div>
        </div>
    </div>
    @endsection                               
                
                    
                           

   
 
    

                                
                
          
                