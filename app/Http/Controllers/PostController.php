<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostValidateRequest;
use App\User;
use Auth;
use App\Post;
use Session;
use Redirect;
use App\Services\PostServices;

class PostController extends Controller
{
 
    public function index()
    {
        
        return view('posts.index',compact('posts'));
    }


    public function create(User $user)
    {
        
        return view ('posts.create',compact('user'));
    }


    public function store( PostValidateRequest $request)
    {
        $post = new Post($request->all());
        $post=(new PostServices)->UploadFile( $post, $request);
        Session::flash('message','Post Created!!');
        return redirect()->route('posts.index') ;         
    }

  
    public function edit(Post $post)
    {
       $post=(new UserRepository)->UpdateUser(Request $request, User $user)
        return view('posts.edit',compact('post'));
    }

  
    public function update(PostValidateRequest $request, Post $post)
    {
        
        $post=(new PostServices())->UploadFile( $post, $request);
        Session::flash('message','Post updated!!');
        return redirect()->route('posts.index') ;   
    }


    public function destroy(Post $post)
    {
        
        $post->delete();
        Session::flash('message','deleted');
        return redirect()->route('posts.index');
    }
}
