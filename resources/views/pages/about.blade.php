@extends('layouts.app')

@section('title', 'About Page')

@section('content')
    <div class="flex justify-center mt-5">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h1>{{ __('About Page') }}</h1>
            <p>@lang('Hello', ["name" => "Mg Mg"])</p>
        </div>
    </div>
@endsection