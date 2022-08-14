@extends('layouts.app')

@section('title', 'Post Create')

@section('content')
    <div class="flex justify-center mt-5">
        <div class="w-5/12 bg-white p-6 rounded-lg">
            @auth
                <form action="{{ route('posts') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full rounded-lg p-4 @error('body') border-red-500                       
                        @enderror" placeholder="Enter your post"></textarea>
                    </div>
                    @error('body')
                        <div class="text-red-500 mt-2 text-sm mb-2">
                            {{ $message }}
                        </div>
                    @enderror

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">
                            Post
                        </button>
                    </div>
                </form>
            @endauth
            @if($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach

                {{ $posts->links() }}
            @else
                <p>No Post</p>
            @endif
        </div>
    </div>
@endsection