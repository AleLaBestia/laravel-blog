<?php
namespace App\Repositories;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\PostServices;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PostValidateRequest;


class PostRepository extends PostRepositoryInterface
{
    public function storePost(PostValidateRequest $request,PostServices $post)
    {
        $post = new Post($request->all());
        $post->UploadFile( $post, $request);
        Session::flash('message','Post Created!!');
    }


    public function updatePost(PostServices $post,PostValidateRequest $request)
    {
        
        $post->UploadFile( $post, $request);
        Session::flash('message','Post updated!!');
    }

    public function deletePost(Post $post,$id)
    {
        $post->delete($id);
        Session::flash('message','deleted');
    }
}