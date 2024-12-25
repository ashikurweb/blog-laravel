<header class="shadow-2xl">
    <nav class="bg-slate-900 py-4 shadow-lg">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            {{-- logo --}}
            <a href="/" class="flex items-center space-x-2">
                <span class="sr-only">Blogify</span>
                <p class="text-2xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-purple-500 hover:to-indigo-500 transition-all duration-300" style="font-family: 'Merienda', sans-serif;">
                    Blogify
                </p>
            </a>

            {{-- nav links --}}
            <div class="hidden md:flex items-center justify-center space-x-6 flex-grow">
                <x-nav-link href="{{ route('home') }}" :active="request()->is('/')">Home</x-nav-link>
            </div>

            @auth
                <div class="relative ml-4">
                    <!-- Profile Image Button -->
                    <img src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}" alt="User Profile" class="w-10 h-10 ring-2 ring-indigo-600 bg-indigo-600 rounded-full cursor-pointer hover:ring-4 hover:bg-indigo-500" onclick="toggleDropdown()">

                    <!-- Dropdown Menu -->
                    <div id="dropdown"
                        class="absolute right-0 mt-2 w-48 bg-slate-950 rounded-lg shadow-lg opacity-0 scale-95 transition-all duration-300 ease-out transform origin-top-right hidden">
                        <p class="block px-4 py-2 text-green-500 font-bold hover:border-transparent ">{{ auth()->user()->name }}</p>
                        <a href="{{ route('admin') }}" class="block px-4 py-2 text-gray-300 hover:bg-slate-900 rounded-lg">
                            <i class="fas fa-home mr-1"></i>Dashboard
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2 text-rose-500 hover:text-white hover:bg-rose-600 rounded-lg">
                            @csrf
                            <button type="submit">
                                <i class="fas fa-sign-out-alt mr-1"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <div class="hidden md:flex ml-auto">
                    <a href="{{ route('login') }}" class="flex items-center text-white space-x-2">
                        <span class="custom-login-btn">
                            <i class="fa-solid fa-user text-white mr-2"></i> My Account
                        </span>
                    </a>
                </div>
            @endguest

            {{-- Mobile Menu Button --}}
            <div class="md:hidden">
                @guest
                <a href="">
                    <span class="inline-block font-bold rounded-full px-2 py-1 mr-5 hover:text-sky-600 text-white">
                        <i class="fa-solid fa-user text-xl"></i>
                    </span>
                </a>
                @endguest
                <button id="mobile-menu-toggle" class="text-white focus:outline-none">
                    <i class="fa-solid fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <div id="mobile-menu" class="bg-gray-800 md:hidden">
        <div class="flex flex-col space-y-1 px-4 py-3">
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
        </div>
    </div>
</header>
