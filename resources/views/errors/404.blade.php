@extends('layouts.app')

@section('title', '404 Error')

@section('content')
    <div class="pb-5">
        <div class="mt-5">
            <img src="/img/404.svg" alt="404 Error" style="width: 500px; margin: 0 auto">
        </div>
        <div class="flex justify-content-center mt-5">
            <div>
                <a href="/" class="bg-purple-500 text-white px-5 py-3 rounded font-medium w-full">Home</a>
            </div>
        </div>
    </div>
@endsection