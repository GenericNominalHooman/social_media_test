<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth"]);
    }

    public function store(Post $post, Request $request){
        // Check whether the user has already liked the post
        if($post->likedBy($request->user())){
            return response(null, 409);
        }
        
        // Create a like instance
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        // Check whether user has already unlike and relike the same post
        if($post->likes()->onlyTrashed()->contains('user_id', auth()->user()->id)->count()){
            // Create an email on the first like instance only
            Mail::to($post->user)->send(new PostLiked($request->user(), $post));
        }

        // Redirect the user
        return back();
    }

    public function destroy(Post $post, Request $request){
        // Delete all likes that is made on a post by the currently authenthicated user
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
