<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(["guest"]);
    }

    public function index(){
        return view("auth.register");
    }

    public function store(Request $request){
        // Validate
        $this->validate($request, [
            "name" => "required|min:3|max:255",
            "username" => "required|min:3|max:255",
            "email" => "required|email",
            "password" => "required|confirmed",
        ]);

        // Create user
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "username" => $request->username,
            "password" => Hash::make($request->password),
        ]);

        // Loging in the user
        auth()->attempt($request->only('email', 'password'));

        // Redirect the user
        return redirect()->route("dashboard");
    }
}
