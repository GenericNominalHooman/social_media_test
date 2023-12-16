@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <form action="{{ route('posts') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="5" class="bg-gray-100 border-2 w-full p-4 rounded-lg" placeholder="Post something!"></textarea>
                @error('body')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
                <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
            </div>
        </form>
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