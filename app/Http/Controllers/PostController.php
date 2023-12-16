<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // Fetch a list of posts
        $posts = Post::latest()->with(['likes', 'user'])->paginate(5);

        // Parse the list of post into index
        return view("index", [
            "posts" => $posts,
        ]);
    }

    public function store(Request $request){
        $this->middleware(["auth"]);
        
        // Validate user input
        $this->validate($request, [
            "body"=>"required",
        ]);
        
        // Create user post
        $request->user()->posts()->create($request->only("body"));

        // Redirect user
        return back();
    }

    public function destroy(Post $post){
        // Check whether user can delete post
        $this->authorize('delete', $post);

        // Delete the post
        $post->delete();

        // Redirect
        return back();
    }

    public function show(Post $post){
        // Post page
        return view("user.posts.show", [
            "post" => $post,
        ]);
    }
}
