<div class="flex items-center justify-between bg-gray-800 p-4 rounded-lg mb-6">
    <div class="text-lg font-bold"><span class="text-3xl">Welcome &#9830;</span> <span class="text-sky-600 text-2xl">{{ auth()->user()->name }} <span class="text-2xl text-green-600">&#10023;</span> <span class="text-white font-medium text-xl hover:underline hover:text-indigo-500 transition-all duration-200"><a href="{{ url('/') }}">Home</a></span></span></div>
    
    <div class="flex items-center space-x-4">
        <div class="relative ml-4">
            <!-- Profile Image Button -->
            <img src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                alt="User Profile" class="w-10 h-10 ring-2 ring-indigo-600 bg-indigo-600 rounded-full cursor-pointer hover:ring-4 hover:bg-indigo-500" onclick="toggleDropdown()">
            <!-- Dropdown Menu -->
            <div id="dropdown"
                class="absolute right-0 mt-2 w-48 bg-gray-900 rounded-lg shadow-lg opacity-0 scale-95 transition-all duration-300 ease-out transform origin-top-right hidden">
                
                <a href="{{ route('admin') }}" class="block px-4 py-2 text-gray-300 hover:bg-slate-700 rounded-lg">
                    <i class="fa-solid fa-user mr-1"></i>Profile
                </a>
                <a href="{{ route('admin') }}" class="block px-4 py-2 text-gray-300 hover:bg-slate-700 rounded-lg">
                    <i class="fa-solid fa-gear mr-1"></i>Settings
                </a>

                <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2 text-rose-500 hover:text-white hover:bg-rose-600 rounded-lg">
                    @csrf
                    <button type="submit">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>