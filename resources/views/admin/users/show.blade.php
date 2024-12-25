@extends('admin.layouts.layout')


@section('content')
    <div class="flex">
        @include('admin.partials.sidebar')

        <!-- Main Content -->
        <div class="flex-1 bg-gray-900 p-6">
            <!-- Top Navbar -->
            @include('admin.partials.topbar')

            <div class="bg-slate-900 text-white">
                <div class="container mx-auto py-10 px-5">
                    <h2 class="text-4xl font-semibold mb-8 text-center text-gradient bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-purple-600">
                        Total Users
                    </h2>
            
                    <!-- Table -->
                    <div class="overflow-x-auto bg-gray-800 rounded-xl shadow-lg ring-2 ring-gray-600">
                        <table class="min-w-full table-auto text-sm text-gray-300">
                            <thead class="bg-gradient-to-r from-purple-700 to-indigo-700 text-gray-200">
                                <tr>
                                    <th class="px-6 py-4 text-left">ID</th>
                                    <th class="px-6 py-4 text-left">Profile Image</th>
                                    <th class="px-6 py-4 text-left">Name</th>
                                    <th class="px-6 py-4 text-left">Email</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-600">
                                <!-- User Row -->
                                @foreach ($users as $user)
                                <tr class="hover:bg-slate-900 transition-all duration-300">
                                    <td class="px-6 py-4">{{ $user->id }}</td>
                                    <td class="px-6 py-4">
                                        <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}" class="w-12 h-12" alt="">
                                    </td>
                                    <td class="px-6 py-4">{{ $user->name }}</td>
                                    <td class="px-6 py-4">{{ $user->email }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="m-4">
                {{ $users->links() }}
            </div>
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
        </script>
        </body>

        </html>

    </div>
    </div>
@endsection
