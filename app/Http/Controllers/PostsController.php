<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PostsController extends Controller
{
    //
    public function index()
    {
    	$posts = Post::all();
    	return view('welcome', compact('posts'));
    }

    public function show(Post $post)
    {
    	return view('showPost', compact('post'));
    }

    public function add(Request $request)
    {
    	Post::create($request->all());
    	return back();
    }

    public function edit(Post $post)
    {
        return view('edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
         $post->update($request->all());
         return view ('showPost', compact('post'));
    }

    public function sortbytitle()                                      
    {
        $posts = Post::orderBy('title', 'desc')->get();
        return view('welcome', compact('posts'));
    }
}
