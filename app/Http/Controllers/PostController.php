<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show'])
        ];
    }

    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return view('home', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.post-create');
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
            'published_at' => 'required|date',
            'content' => 'required|min:5',
            'category' => 'required',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp|max:5000'
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('posts', $request->image);
        }

        Auth::user()->posts()->create([
            'title' => $fields['title'],
            'author' => $fields['author'],
            'published_at' => $fields['published_at'],
            'content' => $fields['content'],
            'category' => $fields['category'],
            'image' => $path
        ]);

        return redirect()->route('admin.posts.post-show')->with('success', 'Post Created Successfully');
    }


    public function show(Post $post)
    {
        return view('post.post-show', compact('post'));
    }



    public function edit(Post $post)
    {
        Gate::authorize('modify', $post);

        return view('admin.posts.post-edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        Gate::authorize('modify', $post);

        $fields = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
            'published_at' => 'required|date',
            'content' => 'required|min:5',
            'category' => 'required',
            
        ]);

        $path = $post->image ?? null;
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete( $post->image);
            }
            $path = Storage::disk('public')->put('posts/', $request->image);
        } else {
            $path = $post->image;
        }

        $post->update([
            'title' => $fields['title'],
            'author' => $fields['author'],
            'published_at' => $fields['published_at'],
            'content' => $fields['content'],
            'category' => $fields['category'],
            'image' => $path
        ]);
        return redirect()->route('admin.posts.post-show')->with('success', 'Post Updated Successfully');
    }

    public function destroy(Post $post)
    {
        Gate::authorize('modify', $post);

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('admin.posts.post-show')->with('warning', 'Post Deleted Successfully');
    }


    public function userPosts(User $user)
    {
        $posts = $user->posts()->latest()->paginate(6);

        return view('user-post', compact('posts', 'user'));
    }
}
// https://youtu.be/OO_-MbnXQzY?si=tVrCWlfIqIdrvytp