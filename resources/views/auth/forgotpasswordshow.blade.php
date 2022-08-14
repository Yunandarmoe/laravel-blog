@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="flex justify-center mt-5">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="{{ route('resetpassword.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your Email" class="bg-gray-100 border-2 w-full p-3 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your Password" class="bg-gray-100 border-2 w-full p-3 rounded-lg @error('password') border-red-500 @enderror" value="">
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection