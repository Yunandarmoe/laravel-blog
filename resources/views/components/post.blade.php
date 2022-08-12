@props(['post' => $post])

<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}<span class="text-gray-600 text-sm ml-2">{{ $post->created_at->diffForHumans() }}</span></a>
    <p class="mb-2">{{ $post->body }}</p>
</div>

@can('delete', $post)
    <div>
        <form action="{{ route('posts.destroy', $post) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    </div>
@endcan

<div class="flex items-center mb-2">
    @auth
        @if(!$post->likeBy(auth()->user()))
            <form action="{{ route('posts.likes', $post->id) }}" method="POST" class="mr-1">
                @csrf
                <button type="submit" class="text-blue-500">Like</button>
            </form>
        @else
            <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500">Unlike</button>
            </form>
        @endif          
    @endauth
    <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
</div>