@extends('admin.layouts.layout')


@section('content')

<div class="flex">
    @include('admin.partials.sidebar')

    <!-- Main Content -->
    <div class="flex-1 bg-gray-900 p-6">
        <!-- Top Navbar -->
        @include('admin.partials.topbar')

        <!-- Dashboard Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Total Posts -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <div class="text-lg font-semibold mb-4">Total Posts</div>
                <div class="text-4xl font-bold">{{ $totalPosts }}</div>
            </div>
            
            <!-- Users Registered -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <div class="text-lg font-semibold mb-4">Users Registered</div>
                <div class="text-4xl font-bold">{{ $totalUsers }}</div>
            </div>
            
            <!-- Pending Approvals -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <div class="text-lg font-semibold mb-4">Total Comments</div>
                <div class="text-4xl font-bold">60</div>
            </div>

        </div>
        

        <!-- Blog Posts Management -->
        <div class="mt-8 bg-gray-800 p-6 rounded-lg shadow-lg">
            <div class="text-lg font-semibold mb-4">Manage Blog Posts</div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.posts.post-create') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg">
                    Add New Post
                </a>
                <a href="{{ route('home') }}" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg">
                    View All Posts
                </a>
            </div>
        </div>

    </div>
</div>

@endsection