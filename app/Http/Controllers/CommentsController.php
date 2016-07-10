<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    //
    public function add(Request $request, Post $post)
    {
    	$comment = new Comment;
    	$comment->body = $request->body;
    	$post->comments()->save($comment);

    	return back();
    }
}
