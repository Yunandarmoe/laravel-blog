@extends('layouts.app')

@section('title', 'Forgot Password Send Email')

@section('content')
    <div class="flex justify-center mt-5">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            @if(session('status'))
                <div class="bg-green-500 p-3 rounded-lg mb-6 text-white">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('forgotpassword.store') }}" method="POST">
                @csrf
                <div>
                    <label for="email-addresss" class="sr-only">Email Address</label>
                    <input type="text" name="email" id="email-address"
                        class="mt-2 bg-gray-100 border-2 w-full p-3 rounded-lg @error('email') border-red-500 @enderror"
                        value="">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-3">
                    <button type="submit" class="bg-blue-500 text-white px-2 py-2 rounded font-medium">
                        Send Email
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
