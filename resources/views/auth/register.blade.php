@extends('components.layout')
@section('title', 'Register here!')
    
@section('content')
    <div class="flex items-center pb-15 justify-center min-h-screen">
        <div class="bg-gray-800 shadow-lg rounded-lg p-6 w-full max-w-xl">
            <h1 class="title text-center mb-6 text-white text-4xl font-bold">Register a new account</h1>

            <form action="{{ route('register') }}" method="POST">
                @csrf   

                {{-- Name --}}
                <div class="mb-4 relative">
                    <label for="name" class="text-gray-300">Name</label>
                    <div class="relative">
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="input @error('name') ring-red-500 @enderror pl-12" placeholder="Enter Your Name">
                        <span class="icon-wrapper absolute left-3 top-1/2 transform -translate-y-1/2 p-2">
                            <i class="fa-solid fa-user text-gray-400 text-lg"></i>
                        </span>
                    </div>

                    @error('name')
                        <p class="errors">{{ $message }}</p>
                    @enderror
                </div>
                
                {{-- Email --}}
                <div class="mb-4 relative">
                    <label for="email" class="text-gray-300">Email</label>
                    <div class="relative">
                        <input type="email" name="email" id="email" class="input @error('email') ring-red-500 @enderror pl-12" placeholder="Enter Your Email">
                        <span class="icon-wrapper absolute left-3 top-1/2 transform -translate-y-1/2 p-2">
                            <i class="fa-solid fa-envelope text-gray-400 text-lg"></i>
                        </span>
                    </div>

                    @error('email')
                        <p class="errors">{{ $message }}</p>
                    @enderror
                </div>


                {{-- Password --}}
                <div class="mb-4 relative">
                    <label for="password" class="text-gray-300">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" class="input @error('password') ring-red-500 @enderror pl-12" placeholder="Enter Your Password">
                        <span class="icon-wrapper absolute left-3 top-1/2 transform -translate-y-1/2 p-2">
                            <i class="fa-solid fa-key text-gray-400 text-lg"></i>
                        </span>
                    </div>

                    @error('password')
                        <p class="errors">{{ $message }}</p>
                    @enderror
                </div>
                
                {{-- Confirm Password --}}
                <div class="mb-8 relative">
                    <label for="password_confirmation" class="text-gray-300">Confirm Password</label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="input @error('password') ring-red-500 @enderror pl-12" placeholder="Confirm Your Password">
                        <span class="icon-wrapper absolute left-3 top-1/2 transform -translate-y-1/2 p-2">
                            <i class="fa-solid fa-key text-gray-400 text-lg"></i>
                        </span>
                    </div>
                </div> 

                <button type="submit" class="btn">Sign up</button>

                <div class="mb-4">
                    <span class="text-gray-300 mt-2 text-md flex justify-between">
                        Already have an account? <a href="{{ route('login') }}" class="text-indigo-400 font-bold hover:text-indigo-500 hover:underline transition-all duration-200">Sign in here</a> 
                    </span>
                </div>
            </form>
        </div>
    </div>
    @endsection