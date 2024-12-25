@extends('admin.layouts.layout')


@section('content')

<div class="min-h-screen flex items-center justify-center">
    <div class="text-center space-y-8">
        <!-- Video Section -->
         <div class="reletive overflow-hidden w-64 h-64 rounded-full max-w-2xl mx-auto">
            <picture>
                <img src="{{ asset('assets/video/unauthorized.gif') }}" alt="">
            </picture>
         </div>
        <!-- Message -->
        <p class="text-2xl text-gray-100">Sorry, You are not Authorized view this page?</p>
        <!-- Go to Homepage -->
        <a href="{{ url('/') }}" class="inline-block hover:underline">&#8592;Go back to home</a>
    </div>
</div>

@endsection