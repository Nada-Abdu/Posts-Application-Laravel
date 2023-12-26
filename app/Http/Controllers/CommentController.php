<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => ['required', 'string']
        ]);

        $post = Post::find($request->postId);

        $comment = Comment::create([
            'description' => $request->comment,
            'created_at' => Carbon::now(),
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
        ]);


        return redirect()->route('posts.show', $post)->with('success', 'Comment Sent Successfully');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Comment Deleted Successfully');
    }
}
