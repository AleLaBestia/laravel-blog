<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Repositories\FrontControllerRepositoryInterface;

class FrontController extends Controller
{
    public function index(FrontControllerRepositoryInterface $posts)
    {
        $posts->OrderById();
        return view('frontend',compact('posts'));
    }

    public function post(FrontControllerRepositoryInterface $post, $slug)
    {
        $post->postSlug();
        return view('post',compact('post'));
    }
}
