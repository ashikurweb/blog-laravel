@extends('components.layout')

@section('content')

<h1 class="text-5xl font-bold text-white text-center text-gradient mb-16 mt-4">
    {{ $user->name  }}'s Posts &#9830; <span class="text-pink-700">{{ $posts->total() }}</span>
</h1>

<div class="grid m-20 gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
    @foreach ($posts as $post)
    <x-postCard :post="$post"/>
    @endforeach
</div>

<div class="m-9 p-10 -mt-8">
    {{ $posts->links() }}
</div>

@endsection