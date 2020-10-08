<?php

namespace App\Http\Controllers;


use App\Post;
use App\User;
use Redirect;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Http\Requests\PostValidateRequest;
use App\Repositories\PostRepositoryInterface;

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


    public function store( PostValidateRequest $request,PostRepositoryInterface $post )
    {
        $post->storePost( $post, $request);
        return redirect()->route('posts.index') ;         
    }

  
    public function edit(Post $post)
    {
        
        return view('posts.edit',compact('post'));
    }

  
    public function update(PostValidateRequest $request, PostRepositoryInterface $post)
    {
        
        $post->updatePost( $post, $request);
        return redirect()->route('posts.index') ;   
    }


    public function destroy( PostRepositoryInterface $post,$id  )
    {
        
        $post->deletePost($id);
        return redirect()->route('posts.index');
    }
}
