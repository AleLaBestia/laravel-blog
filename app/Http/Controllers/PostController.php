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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $user=User::find(Auth::User()->id);
        return view ('posts.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( PostValidateRequest $request)
    {
        $post = new Post($request->all());
        $post=(new PostServices())->UploadFile( $post, $request);
        Session::flash('message','Post Created!!');
        return redirect()->route('posts.index') ;         
    }

  
    public function edit($id)
    {
        $post=Post::find($id);
        return view('posts.edit',compact('post'));
    }

  
    public function update(PostValidateRequest $request, $id)
    {
        $post = Post::find($id);
        $post=(new PostServices())->UploadFile( $post, $request);
        Session::flash('message','Post updated!!');
        return redirect()->route('posts.index') ;   
    }


    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        Session::flash('message','deleted');
        return redirect()->route('posts.index');
    }
}
