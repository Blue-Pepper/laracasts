<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Post $post){
        request()->validate([
            'body' => 'required'
        ]);

        //add a comment to post
        $post->comment()->create([  // we don't need to add the post id because the relationship already does it for us
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back();
    }
}
