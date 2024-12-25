<div class="flex justify-between items-center bg-gray-800 p-4 rounded-lg shadow-md mb-6">
    <div class="w-full">
        <h2 class="text-4xl font-bold text-slate-200 py-4">Create New Post</h2>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Title --}}
            <div class="mb-4">
                <label for="title" class="block text-gray-300 text-sm font-bold mb-2">Post Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="post__input @error('title') border-red-500 @enderror" placeholder="Enter blog post title">

                @error('title')
                    <p class="errors">{{ $message }}</p>
                @enderror
            </div>

            {{-- Author --}}
            <div class="mb-4">
                <label for="author" class="block text-gray-300 text-sm font-bold mb-2">Author</label>
                <input type="text" id="author" name="author" value="{{ old('author') }}" class="post__input @error('author') border-red-500 @enderror" placeholder="Enter Author name">

                @error('author')
                    <p class="errors">{{ $message }}</p>
                @enderror
            </div>

            {{-- Published_at --}}
            <div class="mb-4">
                <label for="published_at" class="block text-gray-300 text-sm font-bold mb-2">Published At</label>
                <input type="date" value="{{ old('published_at') }}" class="post__input @error('published_at') border-red-500 @enderror" name="published_at" id="published_at">

                @error('published_at')
                    <p class="errors">{{ $message }}</p>
                @enderror
            </div>

            {{-- Content --}}
            <div class="mb-4">
                <label for="content" class="block text-gray-300 text-sm font-bold mb-2">Post Content</label>
                <textarea rows="5" name="content" value = {{ old('content') }} id="content" class="post__input @error('content') @enderror h-56" placeholder="Write your post here..."></textarea>

                @error('content')
                    <p class="errors">{{ $message }}</p>
                @enderror
            </div>

            {{-- Category --}}
            <div class="mb-4">
                <label for="category" class="block text-gray-300 text-sm font-bold mb-2">Category</label>
                <select name="category" id="category" class="post__input @error('category') border-red-500 @enderror">
                    <option value="">--Choose Category--</option>
                    <option value="Technology" {{ old('category') == 'Technology' ? 'selected' : '' }}>Laravel</option>
                    <option value="Business" {{ old('category') == 'Business' ? 'selected' : '' }}>Frontend</option>
                    <option value="Lifestyle" {{ old('category') == 'Lifestyle' ? 'selected' : '' }}>Backend</option>
                    <option value="Sports" {{ old('category') == 'Sports' ? 'selected' : '' }}>React Js</option>
                    <option value="Javascript" {{ old('category') == 'Javascript' ? 'selected' : '' }}>Javascript</option>
                    <option value="Vue Js" {{ old('category') == 'Vue Js' ? 'selected' : '' }}>Vue Js</option>
                </select>
                
                @error('category')
                    <p class="errors">{{ $message }}</p>
                @enderror
            </div>
            

            {{-- Feature Image --}}
            <div class="mb-4">
                <label for="image" class="block text-gray-300 text-sm font-bold mb-2">Feature Image</label>
                <input type="file" id="image" name="image" class="post__input cursor-pointer">

                @error('image')
                    <p class="errors">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div class="text-left">
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600">Publish Post</button>
            </div>
        </form>
    </div>
</div>
