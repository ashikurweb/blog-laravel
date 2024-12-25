@extends('admin.layouts.layout')


@section('content')
    <div class="flex">
        @include('admin.partials.sidebar')

        <!-- Main Content -->
        <div class="flex-1 bg-gray-900 p-6">
            <!-- Top Navbar -->
            @include('admin.partials.topbar')

            <main class="flex-grow bg-gray-800">
                <!-- Header -->
                <header class="p-6 border border-slate-800 text-center bg-slate-900 shadow">
                    <h1 class="text-4xl font-bold text-slate-300">Edit Profile</h1>
                </header>

                <!-- Profile Edit Form -->
                <section class="p-8">
                    
                        <form action="{{ route('admin.user.update', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Profile Picture Section -->
                            <div class="flex items-center justify-center mb-8">
                                <div
                                    class="relative border border-slate-700 hover:border-indigo-600 transition-all duration-200 rounded-full bg-slate-600">
                                    <img id="profile-image-preview"
                                        src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                                        alt=""
                                        class="w-32 h-32 ring-2 ring-indigo-600 bg-indigo-600 rounded-full cursor-pointer hover:ring-4 hover:bg-indigo-500 object-cover shadow-md">
                                    <label for="profile_image"
                                        class="absolute bottom-0 right-0 bg-blue-600 p-2 rounded-full cursor-pointer hover:bg-blue-500 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </label>
                                    <input type="file" id="profile_image" name="profile_image" class="hidden"
                                        accept="image/*" onchange="previewProfileImage(event)">
                                </div>
                            </div>

                            <!-- Full Name -->
                            <div class="mb-6">
                                <label for="name" class="block text-slate-400 font-medium mb-2">Full Name</label>
                                <input type="text" id="name" name="name" value="{{ $user->name }}"
                                    class="post__input">
                            </div>

                            <!-- Email -->
                            <div class="mb-6">
                                <label for="email" class="block text-slate-400 font-medium mb-2">Email</label>
                                <input type="email" id="email" name="email" value="{{ $user->email }}"
                                    class="post__input">
                            </div>

                            <!-- Current Password -->
                            <div class="mb-6">
                                <label for="current_password" class="block text-slate-400 font-medium mb-2">Current
                                    Password</label>
                                <input type="password" id="current_password" name="current_password"
                                    class="post__input @error('current_password') border-red-500 @enderror"
                                    placeholder="Enter Current password">

                                @error('current_password')
                                    <p class="errors text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- New Password -->
                            <div class="mb-6">
                                <label for="new_password" class="block text-slate-400 font-medium mb-2">New Password</label>
                                <input type="password" id="new_password" name="new_password"
                                    class="post__input @error('current_password') border-red-500 @enderror"
                                    placeholder="Enter Your New password">

                                @error('new_password')
                                    <p class="errors text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-6">
                                <label for="new_password_confirmation"
                                    class="block text-slate-400 font-medium mb-2">Confirmed Password</label>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                    class="post__input @error('current_password') border-red-500 @enderror"
                                    placeholder="Enter Your Confirmed password">
                            </div>

                            <!-- Buttons -->
                            <div class="flex justify-end space-x-4">
                                <button type="submit"
                                    class="px-6 cursor-pointer py-3 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-500 transition">Update
                                    Profile</button>
                            </div>
                        </form>
                    <div class="max-w-4xl flex justify-start">
                        <div class="relative">
                            <!-- Delete Button -->
                            <div class="-mt-12">
                                <button type="button"
                                    class="px-6 py-3 bg-rose-600 text-white font-bold rounded-lg hover:bg-rose-500 transition"
                                    onclick="openModal()">
                                    Delete Account
                                </button>
                            </div>

                            <!-- Modal Background -->
                            <div id="modal"
                                class="hidden fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300">
                                <!-- Modal Content -->
                                <div class="bg-gray-900 p-6 rounded-lg shadow-lg w-96 text-center">
                                    <h2 class="text-xl font-bold mb-4 text-gray-300">Are you sure?</h2>
                                    <p class="text-gray-200 mb-6">Do you want to delete your account?</p>
                                    <div class="flex justify-center gap-4">
                                        <button type="button"
                                            class="px-6 py-2 bg-gray-200 text-gray-900 rounded-lg hover:bg-gray-300 transition"
                                            onclick="closeModal()">
                                            Cancel
                                        </button>
                                        <form action="{{ route('admin.user.destroy') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-6 py-2 bg-rose-600 text-white rounded-lg hover:bg-rose-500 transition">
                                                Confirm
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>

        <!-- JavaScript for Profile Picture Preview -->
        <script>
            function previewProfileImage(event) {
                const reader = new FileReader();
                reader.onload = function() {
                    const preview = document.getElementById('profile-image-preview');
                    preview.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }

            function openModal() {
                const modal = document.getElementById('modal');
                modal.classList.remove('hidden'); // Show modal
                setTimeout(() => {
                    modal.classList.add('opacity-100'); // Fade in
                    modal.classList.remove('opacity-0');
                }, 10); // Delay to trigger CSS transition
                document.body.classList.add('overflow-hidden'); // Disable body scroll
            }

            function closeModal() {
                const modal = document.getElementById('modal');
                modal.classList.add('opacity-0'); // Fade out
                modal.classList.remove('opacity-100');
                setTimeout(() => {
                    modal.classList.add('hidden'); // Hide modal after fade out
                }, 300); // Match the transition duration
                document.body.classList.remove('overflow-hidden'); // Enable body scroll
            }
        </script>
        </body>

        </html>

    </div>
    </div>
@endsection
