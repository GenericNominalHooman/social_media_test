<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth"]);
    }

    public function store(Request $request){
        // Loging user out
        auth()->logout();
        
        // Redirect user to post
        return redirect()->route("home");
    }
}
