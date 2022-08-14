@extends('layouts.app')

@section('title', 'Post List')

@section('content')
    <div class="flex justify-center mt-5">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <x-post :post="$post" />
        </div>
    </div>
@endsection