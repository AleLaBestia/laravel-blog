<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class FrontController extends Controller
{
    public function index()
    {
        $posts=Post::orderBy('id','DESC')->paginate(8);
        return view('frontend',compact('posts'));
    }

    public function post($slug)
    {
        $post=Post::where('slug',$slug)->first();
        return view('post',compact('post'));
    }
}
