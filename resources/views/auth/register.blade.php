@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only"></label>
                <input value="{{ @old('name') }}" type="text" name="name" id="name" class="bg-gray-100 border-2 w-full p-4 rounded-lg" placeholder="Your Name">
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="username" class="sr-only"></label>
                <input value="{{ @old('username') }}" type="text" name="username" id="username" class="bg-gray-100 border-2 w-full p-4 rounded-lg" placeholder="Username">
                @error('username')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
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
            <div class="mb-4">
                <label for="password_confirmation" class="sr-only"></label>
                <input value="{{ @old('password_confirmation') }}" type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-100 border-2 w-full p-4 rounded-lg" placeholder="Re-type your password">
                @error('password_confirmation')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <button type="submit" class="w-full p-4 text-white font-bold bg-blue-500 rounded-lg hover:bg-blue-600">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection