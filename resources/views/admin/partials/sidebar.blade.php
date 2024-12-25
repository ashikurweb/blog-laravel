<div class="w-64 bg-gray-800 min-h-screen p-6">
    <div class="mb-10 text-center text-xl font-bold">
        <i class="fas fa-blog"></i> Blog Dashboard
    </div>
    <nav>
        <ul>
            <li>
                <x-admin-nav-link href="{{ route('admin') }}" :active="request()->is('admin')">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </x-admin-nav-link>
            </li>
            <li>
                <x-admin-nav-link href="{{ route('admin.posts.post-create') }}" :active="request()->is('admin/posts/create')">
                    <i class="fa-solid fa-newspaper mr-2"></i> Post Create
                </x-admin-nav-link>
            </li>
            <li>
                <x-admin-nav-link href="{{ route('admin.posts.post-show') }}" :active="request()->is('admin/posts/show')">
                    <i class="fa-brands fa-usps mr-2"></i> User Posts
                </x-admin-nav-link>
            </li>

            <li>
                <x-admin-nav-link href="{{ route('admin.user.show') }}" :active="request()->is('admin/users')">
                    <i class="fa-solid fa-user-group mr-1"></i> Total User 
                </x-admin-nav-link>
            </li>
            
            <li>
                <x-admin-nav-link href="{{ route('admin.user') }}" :active="request()->is('admin/user')">
                    <i class="fa-solid fa-user-edit mr-1"></i> User Profile
                </x-admin-nav-link>
            </li>
            
            <li>
                <x-admin-nav-link href="#" :active="request()->is()">
                    <i class="fa-solid fa-cog fa-spin mr-1" style="--fa-animation-duration: 15s;"></i> Settings
                </x-admin-nav-link>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2 text-rose-500 hover:text-white hover:bg-rose-600 rounded-lg">
                    @csrf
                    <button type="submit">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</div>