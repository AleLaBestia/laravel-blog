<?php
namespace App\Repositories;

use App\Models\Post;

class FrontControllerRepository extends FrontControllerRepositoryInterface
{
    public function OrderById()
    {
        $posts=Post::orderBy('id','DESC')->paginate(8);
    }

    public function postSlug($slug)
    {
        $post=Post::where('slug',$slug)->first();
    }
}