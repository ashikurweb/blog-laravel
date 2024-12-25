<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $data = $request->validate([
            'comment_content' => 'required|string|max:500',
            'parent_id'       => 'nullable|exists:comments,id',
        ]);

        $data['user_id'] = Auth::user()->id;
        $data['post_id'] = $post->id;

        // Check if this is a reply to a comment
        if ($request->has('parent_id')) {
            $parentComment = Comment::find($request->parent_id);
            $parentComment->replies()->create($data);
        } else {
            Comment::create($data);
        }

        return redirect()->route('post.post-show', $post)->with('success', 'Comment successfully added!');
    }
    

}
