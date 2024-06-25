<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index() {
        $authUserId = Auth::user()->id;
        // $posts = DB::table('posts')->where('user_id', '=', $authUserId)->orderBy('created_at', 'desc')->paginate(10);
        $posts = Post::where('user_id', $authUserId)->orderBy('created_at', 'desc')->paginate(5);
        // $posts = Post::whereBelongsTo(Auth::user())->paginate(5);
        return view('post.index', ['posts' => $posts]);
    }

    public function create() {
        return view('post.create');
    }

    public function store() {
        request()->validate([
            'title' => ['required'],
            'content' => ['required']
        ]);

        Post::create([
            'title' => request('title'),
            'content' => request('content'),
            'user_id' => $authUserId = Auth::user()->id
        ]);

        return redirect('/posts');
    }

    public function show(Post $post) {
        return view('post.show', ['post' => $post]);
    }

    public function destroy(Post $post) {
        $post->delete();

        //redirect
        return redirect('/posts');
    }

    public function exposeAPI(Post $post) {
        return new PostResource($post);
    }
}
