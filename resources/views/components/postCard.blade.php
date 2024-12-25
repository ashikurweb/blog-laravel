@props(['post', 'full' => false])

<div class="{{ $full ? 'shadow-none rounded-lg px-6 py-4 mb-6' : 'shadow-lg bg-gray-800 group rounded-lg px-6 py-4 mb-6 transition-transform duration-300 hover:shadow-[0_0_20px_rgba(59,130,246,0.5)] hover:-translate-y-2' }}">
    {{-- Image --}}
    <div class="relative">
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:opacity-80 transition-opacity duration-300">
        @else
            <img src="{{ asset('storage/posts/default.jpg') }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:opacity-80 transition-opacity duration-300">
        @endif
        <div class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded">
            {{ $post->category }}
        </div>
    </div>

    {{-- Content --}}
    <div class="p-6">
        @if ($full)
        <h2 class="text-2xl font-semibold text-white mb-3">
            <span>{{ $post->title }}</span>
        </h2>
        <div class="flex justify-between items-center text-sm text-gray-400 mb-3">
            <span>Posted {{ $post->created_at->diffForHumans() }}</span>
            <span class="hover:text-slate-200  transition-all duration-200">By {{ $post->user->name }}</span>
        </div>
        
        <div class="flex justify-between items-center text-sm mb-3 text-gray-400">
            <span><i class="fa-solid fa-calendar-days mr-1"></i> {{ $post->published_at->format('F j, Y g:i A') }}</span>
        </div>
        
        <div class="text-gray-300 text-md mb-4">
            {{ $post->content  }}
        </div>
        <div class="text-gray-500 mt-2">
            <i class="fa-solid fa-pen-nib mr-1"></i><span class="font-bold">Author:</span> <span class=" hover:text-slate-200 transition-all duration-200">{{ $post->author }}</span>
        </div>
        @else
        <h2 class="text-xl font-semibold text-white mb-3 group-hover:text-blue-500 transition-colors duration-300">
            <a href="{{ route('post.post-show', $post) }}">{{ $post->title }}</a>
        </h2>
        <div class="flex justify-between items-center text-sm text-gray-400 mb-3">
            <span>Posted {{ $post->created_at->diffForHumans() }}</span>
            <a href="{{ route('user-post', $post->user) }}" class="hover:text-slate-200 hover:underline transition-all duration-200">
                <span>By {{ $post->user->name }}</span>
            </a>
        </div>
        
        <div class="flex justify-between items-center text-sm text-gray-400">
            <span><i class="fa-solid fa-calendar-days mr-1"></i> {{ $post->published_at->format('F j, Y g:i A') }}</span>
        </div>
        <p class="text-gray-300 text-md py-4 -mb-3">
            {{ Str::words($post->content, 15) }}
        </p>
        <div class="text-gray-500 flex justify-between mt-2">
            <a href="{{ route('user-post', $post->user) }}">
                <i class="fa-solid fa-pen-nib mr-1"></i><span class="font-bold">Author:</span> <span class=" hover:text-slate-200 hover:underline transition-all duration-200">{{ $post->author }}</span>
            </a>
        </div>
        <a href="{{ route('post.post-show', $post) }}" class="inline-block mt-2 text-md text-blue-600 font-bold hover:underline">
            Read More &rarr;
        </a>
        @endif

        <div class="flex items-center justify-end gap-6 mt-6">
            {{ $slot }}
        </div>
    </div>
</div>












