@extends('admin.layouts.layout')


@section('content')

<section class="bg-white py-16 sm:py-32">
    <div class="container mx-auto px-4">
        <div class="flex justify-center items-center">
            <div class="w-full sm:w-10/12 md:w-8/12 lg:w-6/12 text-center">
                <div class="bg-cover bg-center h-96 rounded-lg overflow-hidden" style="background-image: url('{{ asset('assets/images/dribbble_1.gif') }}');">
                    <h1 class="text-9xl text-rose-500 font-bold tracking-wide text-shadow-md">404</h1>
                </div>

                <div class="contant_box_404 mt-[-50px] px-4 sm:px-8">
                    <h3 class="text-4xl font-semibold text-slate-800">Oop's the page you'r looking for doesn't exist.</h3>
                    <p class="text-lg text-gray-600 mt-4">The page you are looking for is not available!</p>
                    <a href="{{ url('/') }}" class="link_404 mt-6 inline-block text-white bg-green-500 hover:bg-green-600 px-8 py-4 rounded-lg text-lg font-semibold transition-all ease-in-out duration-300 transform hover:scale-105">
                        Go to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection