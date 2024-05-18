<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function store() {
        request()->validate([
            "content" => ["required"]
        ]);

        Comment::create([
            "content" => request("content"),
            "post_id" => request("postId"),
            "user_id" => $authUserId = Auth::user()->id
        ]);
        $postId = request("postId");
        return redirect("/posts/" . $postId);
    }

    public function destroy(Comment $comment) {
        $postId = $comment->post_id;
        $comment->delete();

        //redirect
        return redirect("/posts/" . $postId);
    }

    public function exposeAPI(Comment $comment) {
        return new CommentResource($comment);
    }
}
