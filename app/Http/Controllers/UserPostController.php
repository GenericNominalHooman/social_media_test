<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(User $user){
        // Fetch all posts instance based on the user
        // $posts = Post::latest()->with(['user', 'likes'])->paginate(5);
        $posts = $user->posts()->with(['user', 'likes'])->paginate(5);

        // redirect user
        return view('user.posts.index', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
