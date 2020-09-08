<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use Auth;
use App\Post;
use Session;
use Redirect;

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
    public function store(Request $request)
    {
        $rules=[
            'title'=>'required',
            'body'=>'required',
            'image'=>'mimes:jpeg,png,jpg,gif',
        ];

        $messages=[
            'title.required'=>'pLs insert text',
            'body.required'=>'pLs insert text',
            'image.mimes'=>'insert image format jpeg,png,jpg or gif',
            
        ];
        $this->validate($request,$rules,$messages);

        $post = new Post($request->all());
        $post->slug=Str::slug($request->title);
        $post->save();

        if ($request->file('image')){
            $nombre=Storage::disk('imaposts')->put('imagenes/posts',$request->file('image'));
            $post->fill(['image' => asset($nombre)] )->save(); 
        }
        Session::flash('message','Post Created!!');
        return redirect()->route('posts.index') ;         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'title'=>'required',
            'body'=>'required',
            'image'=>'mimes:jpeg,png,jpg,gif',
        ];

        $messages=[
            'title.required'=>'pLs insert text',
            'body.required'=>'pLs insert text',
            'image.mimes'=>'insert image format jpeg,png,jpg or gif',
            
        ];
        $this->validate($request,$rules,$messages);

        $post = Post::find($id);
        $post->slug=Str::slug($request->title);
        $post->update($request->all());

        if ($request->file('image')){
            $nombre=Storage::disk('imaposts')->put('imagenes/posts',$request->file('image'));
            $post->fill(['image' => asset($nombre)] )->save(); 
        }
        Session::flash('message','Post updated!!');
        return redirect()->route('posts.index') ;   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        Session::flash('message','deleted');
        return redirect()->route('posts.index');
    }
}
