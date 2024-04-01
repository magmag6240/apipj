<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $post_comments = Post::with('user')->withCount('likes')->with(['comments' => function ($query) {
            $query->with('user');
        }])->where('id', $request->id)->get();
        return response()->json([
            'data' => $post_comments
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment_user = User::where('email', $request->email)->first();
        $comment = Comment::create([
            'user_id' => $comment_user->id,
            'post_id' => $request->post_id,
            'comments' => $request->comments,
        ]);
        return response()->json([
            'data' => $comment
        ], 201);
    }
}
