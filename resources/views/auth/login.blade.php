@extends('components.layout')
@section('title', 'Welcome Login')

@section('content')
    <div class="flex items-center pb-20 justify-center min-h-screen">
        <div class="bg-gray-800 shadow-lg rounded-lg p-6 w-full max-w-lg">
            <h1 class="title text-center mb-4 text-white text-4xl font-bold">Welcome Back</h1>

            <form action="{{ route('login') }}" method="POST">
                @csrf

                {{-- Email --}}
                <div class="mb-4 relative">
                    <label for="email" class="text-gray-300">Email</label>
                    <div class="relative">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="input @error('email') ring-red-500 @enderror pl-12" placeholder="Enter Your Email">
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

                {{-- Remember Checkbox --}}
                <div class="mb-4">
                    <input type="checkbox" name="remember" id="remember" class="text-gray-300">
                    <label for="remember" class="text-gray-300">Remember Me</label>
                </div>

                @error('failed')
                    <p class="errors">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn">Sign in</button>

                <div class="mb-4">
                    <span class="text-gray-300 mt-2 text-md flex justify-between">
                        Don't have an account?  <a href="/register" class="text-indigo-400 font-bold hover:text-indigo-500 hover:underline transition-all duration-200">Sign up here</a> 
                    </span>
                </div>
            </form>
        </div>
    </div>
    @endsection

    