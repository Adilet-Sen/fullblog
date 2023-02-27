<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsRequest;
use App\Models\Post;


class CommentsController extends Controller
{
    public function store(CommentsRequest $request,$id)
    {
        $post = Post::find($id);
        $post->comments()->create($request->all());

        return redirect()->back()->with('status', 'Comment successfully added, after validation with the administrator, your comment will be published!');
    }
}
