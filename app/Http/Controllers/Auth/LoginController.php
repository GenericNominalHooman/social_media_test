<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(["guest"]);
    }

    public function index(){
        return view("auth.login");
    }

    public function store(Request $request){
        // Verify
        $this->validate($request, [
            "email" => "required|email",
            "password" => "required",
        ]);

        // Login
        if(!auth()->attempt($request->only("email", "password"), $request->remember_me)){
            return back()->with("status", "Invalid login details");
        }

        // Redirect
        return redirect()->route("dashboard");
    }
}
