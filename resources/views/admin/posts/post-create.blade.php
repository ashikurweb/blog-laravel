@extends('admin.layouts.layout')


@section('content')

<div class="flex">
    @include('admin.partials.sidebar')

    <!-- Main Content -->
    <div class="flex-1 bg-gray-900 p-6">
        <!-- Top Navbar -->
        @include('admin.partials.topbar')
        
        @include('admin.partials.posts-form')
    </div>

@endsection