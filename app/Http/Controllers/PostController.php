<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->withCount('likes')->get();
        return response()->json([
            'data' => $posts
        ], 200);
    }

    public function store(Request $request)
    {
        $post_user = User::where('email', $request->email)->first();
        $post = Post::create([
            'user_id' => $post_user->id,
            'post_text' => $request->post_text,
        ]);
        return response()->json([
            'data' => $post
        ], 201);
    }

    public function destroy(Request $request)
    {
        $post = Post::where('id', $request->id)->delete();
        if ($post) {
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}
