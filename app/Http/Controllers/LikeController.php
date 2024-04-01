<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\User;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $my_like = Like::where('user_id', $user->id)->where('post_id', $request->id)->first();

        if (!empty($my_like))  {
            $my_like->delete();
            if ($my_like) {
                return response()->json([
                    'message' => 'Deleted successfully',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
        } else {
            Like::create([
                'user_id' => $user->id,
                'post_id' => $request->id,
            ]);
            return response()->json([
                'data' => $user
            ], 201);
        }
    }
}
