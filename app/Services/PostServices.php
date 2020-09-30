<?php 

namespace App\Services;

use App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostServices{
    function UploadFile(Post $post, Request $request){

        $post->slug=Str::slug($request->title);
        $post->save();

        if ($request->file('image')){
            $nombre=Storage::disk('imaposts')->put('imagenes/posts',$request->file('image'));
            $post->fill(['image' => asset($nombre)] )->save(); 
        }
        return $post;

}}