<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post, Request $request)
    {
//       $data = $request->all();
//       $data['post_id'] = $post->id;
//
//       Comment::create($data);

        $post->comments()->create($request->all());

        $post->createComment($request->all());

       return redirect()->back()->with('message', "Your comment successfully send.");
    }
}
