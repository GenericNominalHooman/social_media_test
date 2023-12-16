<x-mail::message>
# Your post was liked

{{$liker->name}} liked one of your post

<x-mail::button :url="route('post.show', $post)">
View post
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
