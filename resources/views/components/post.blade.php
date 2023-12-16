@props(['post' => $post])

<div>
    <div class="mt-4 p-4 flex flex-col">
        <div class="w-full p-2">
            <a href="{{route('user.posts', $post->user)}}" class="font-bold inline h-3">{{$post->user->username}}</a>
            <p class="ml-2 inline text-sm text-gray-500">| {{$post->user->updated_at->diffForHumans()}}</p>
        </div>
        <div class="w-full p-2">
            {{$post->body}}
        </div>
        <div class="w-full p-2 flex items-center">
            @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{route('post.likes', $post)}}" method="post">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{route('post.likes', $post)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="ml-2 text-blue-500">Unlike</button>
                </form>
            @endif
            @can('delete', $post)
                <form action="{{route('post.delete', $post)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="ml-2 text-blue-500">Delete</button>
                </form>
            @endcan
            @endauth
            <span class="ml-2 text-gray-500 text-sm">@auth | @endauth {{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>
        </div>
    </div>
</div>