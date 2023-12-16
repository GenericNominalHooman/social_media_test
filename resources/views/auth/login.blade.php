@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
        <form action="{{ route('login') }}" method="post">
            @csrf

            <!-- Invalid login handler -->
            @if (session('status'))
            <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                {{session('status')}}
            </div>
            @endif

            <div class="mb-4">
                <label for="email" class="sr-only"></label>
                <input value="{{ @old('email') }}" type="email" name="email" id="email" class="bg-gray-100 border-2 w-full p-4 rounded-lg" placeholder="Email">
                @error('email')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="sr-only"></label>
                <input value="{{ @old('password') }}" type="password" name="password" id="password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" placeholder="Password">
                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember_me" id="remember_me" class="mr-2 bg-gray-100 border-2 p-4 rounded-lg">
                <label for="remember_me">Remember me</label>
                @error('remember_me')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <button type="submit" class="w-full p-4 text-white font-bold bg-blue-500 rounded-lg hover:bg-blue-600">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection