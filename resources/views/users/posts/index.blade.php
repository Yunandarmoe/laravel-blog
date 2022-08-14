@extends('layouts.app')

@section('title', 'User Post')

@section('content')
    <div class="flex justify-center mt-5">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
                <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and received {{ $user->receivedLikes()->count() }} likes</p>
            </div>
            <div class="bg-white p-6 rounded-lg">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-post :post="$post" />
                    @endforeach

                    {{ $posts->links() }}
                @else
                    <p>{{ $user->name }} does not have any posts.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
