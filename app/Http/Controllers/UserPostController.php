<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPostController extends Controller
{
    //
    public function index()
    {
        //
        return view('userPost')
        ->with('posts',Post::where('published',1)->get())
        ->with('categories',Category::get())
        ->with('tags',Tag::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $post=new Post();
        $post->title=$request->title;
        $post->body=$request->body;
        $post->published=0;
        /* $post->like=0; */
        $post->user_id=Auth::user()->id;
        $post->category_id=$request->category_id;
        $post->save();
        $post->tags()->attach($request->tag_id);
        return redirect()->route('posts.index')->with('message','post added successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
       /*  return 9; */
        return view('admin.comments')->with('post',$post)->with('categories',Category::get())->with('tags',Tag::get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $post->title=$request->title;
        $post->body=$request->body;
        $post->category_id=$request->category_id;
        $post->save();
        $post->tags()->sync($request->tag_id);
        return redirect()->route('posts.index')->with('message','post updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->route('posts.index')->with('messages','post deleted successfuly');
    }


    public function storeComment(Request $request,Post $post){
        /* return $request; */
        $comments=new Comment();
        $comments->content=$request->content;
        $comments->post_id=$post->id;
        $comments->auther=Auth::user()->name;
        $comments->user_id=Auth::user()->id;
        $comments->save();
        return redirect()->back();

    }
}


