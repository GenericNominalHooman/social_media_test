@extends('layouts.app')

@section('content')
<div class="flex justify-center flex-col items-center">
    <div class="w-8/12 p-6">
        <h1 class="text-2xl font-medium mb-1">{{$user->name}}</h1>
        <p>Posted {{$posts->count()}} {{Str::plural('post', $posts->count())}} and receives {{$user->receivedLikes->count()}} {{Str::plural('like', $user->receivedLikes->count())}}</p>
    </div>
    <div class="w-8/12 bg-white p-6 rounded-lg">
        @if ($posts->count())
            @foreach ($posts as $post)
                <x-post :post="$post" />
            @endforeach
        @else
            <div class="mt-4 p-4 flex flex-col">
                There are no posts
            </div>
        @endif
        <!-- Pagination links -->
        <div class="w-full inline">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection