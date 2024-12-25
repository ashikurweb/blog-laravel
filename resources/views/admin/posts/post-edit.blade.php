@extends('admin.layouts.layout')


@section('content')

<div class="flex">
    @include('admin.partials.sidebar')

    <!-- Main Content -->
    <div class="flex-1 bg-gray-900 p-6">
        <!-- Top Navbar -->
        @include('admin.partials.topbar')

        <div class="flex justify-between items-center bg-gray-800 p-4 rounded-lg shadow-md mb-6">
            <div class="w-full">
                <h2 class="text-4xl font-bold text-slate-200 py-4">Update Your Post</h2>
        
                <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
        
                    {{-- Title --}}
                    <div class="mb-4">
                        <label for="title" class="block text-gray-300 text-sm font-bold mb-2">Post Title</label>
                        <input type="text" id="title" name="title" value="{{ $post->title }}" class="post__input @error('title') border-red-500 @enderror" placeholder="Enter blog post title">
        
                        @error('title')
                            <p class="errors">{{ $message }}</p>
                        @enderror
                    </div>
        
                    {{-- Author --}}
                    <div class="mb-4">
                        <label for="author" class="block text-gray-300 text-sm font-bold mb-2">Author</label>
                        <input type="text" id="author" name="author" value="{{ $post->author }}" class="post__input @error('author') border-red-500 @enderror" placeholder="Enter Author name">
        
                        @error('author')
                            <p class="errors">{{ $message }}</p>
                        @enderror
                    </div>
        
                    {{-- Published_at --}}
                    <div class="mb-4">
                        <label for="published_at" class="block text-gray-300 text-sm font-bold mb-2">Published At</label>
                        <input type="date" value="{{ $post->published_at ? $post->published_at->format('Y-m-d') : '' }}" class="post__input @error('published_at') border-red-500 @enderror" name="published_at" id="published_at">
                    
                        @error('published_at')
                            <p class="errors">{{ $message }}</p>
                        @enderror
                    </div>
                    
        
                    {{-- Content --}}
                    <div class="mb-4">
                        <label for="content" class="block text-gray-300 text-sm font-bold mb-2">Post Content</label>
                        <textarea rows="5" name="content" id="content" class="post__input @error('content') @enderror h-56" placeholder="Write your post here...">{{ $post->content }}</textarea>
        
                        @error('content')
                            <p class="errors">{{ $message }}</p>
                        @enderror
                    </div>
        
                    {{-- Category --}}
                    <div class="mb-4">
                        <label for="category" class="block text-gray-300 text-sm font-bold mb-2">Category</label>
                        <select name="category" id="category" class="post__input @error('category') border-red-500 @enderror">
                            <option value="">__choose category__</option>
                            <option value="Technology" {{ $post->category == 'Technology' ? 'selected' : '' }}>Technology</option>
                            <option value="Business" {{ $post->category == 'Business' ? 'selected' : '' }}>Business</option>
                            <option value="Lifestyle" {{ $post->category == 'Lifestyle' ? 'selected' : '' }}>Lifestyle</option>
                            <option value="Sports" {{ $post->category == 'Sports' ? 'selected' : '' }}>Sports</option>
                            <option value="Javascript" {{ $post->category == 'Javascript' ? 'selected' : '' }}>Javascript</option>
                            <option value="Vue Js" {{ $post->category == 'Vue Js' ? 'selected' : '' }}>Vue Js</option>
                        </select>
                        
                        @error('category')
                            <p class="errors">{{ $message }}</p>
                        @enderror
                    </div>
                    
        
                    {{-- Feature Image --}}
                    <div class="mb-4">
                        <label for="image" class="block text-gray-300 text-sm font-bold mb-2">Feature Image</label>
                        <input type="file" id="image" name="image" class="w-full px-4 py-3 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent">
                    </div>

                    {{-- Current Image exists --}}
                    @if ($post->image)
                    <div class="mb-4">
                        <label for="image" class="block text-gray-300 text-sm font-bold mb-2">Current Image</label>
                        <img src="{{ asset('storage/' . $post->image) }}" alt="" class="w-1/4 h-64 overflow-hidden object-cover hover:opacity-80 transition-opacity duration-300">
                    </div>
                    @endif
        
                    {{-- Submit Button --}}
                    <div class="flex justify-between">
                        <a href="{{ route('admin.posts.post-show') }}">
                            <button type="button" class="bg-red-600 text-white px-6 py-2 rounded-lg shadow-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-600">Cancel</button>
                        </a>
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600">Update Post</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection