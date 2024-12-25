@extends('admin.layouts.layout')


@section('content')

<div class="flex">
    @include('admin.partials.sidebar')

    <!-- Main Content -->
    <div class="flex-1 bg-gray-900 p-6">
        <!-- Top Navbar -->
        @include('admin.partials.topbar')
        
        {{-- Users Posts --}}
        <h1 class="title">User's Post</h1>
        <div class="grid m-20 gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2">
            @foreach ($posts as $post)
                <x-postCard :post="$post">

                    {{-- Edit --}}
                    <a href="{{ route('admin.posts.edit', $post) }}" class="bg-sky-600 text-white px-6 py-2 rounded-lg shadow-lg hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-600">
                        <i class="fa-solid fa-pen mr-1"></i> Edit
                    </a>
                    {{-- Delete --}}
                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')" class="bg-rose-600 text-white px-6 py-2 rounded-lg shadow-lg hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-600">
                            <i class="fa-solid fa-trash mr-1"></i> Delete
                        </button>
                    </form>
    
                </x-postCard>
            @endforeach
        </div>
        
        <div class="m-9 p-10 -mt-8">
            {{ $posts->links() }}
        </div>
    </div>

@endsection