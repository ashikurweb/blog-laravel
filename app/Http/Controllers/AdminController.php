<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        $totalPosts = Post::count();
        $totalUsers = User::count();
        return view('admin.index', compact('totalPosts', 'totalUsers'));
    }

    public function show () 
    {
        $posts = Auth::user()->posts()->latest()->paginate(6);
        return view('admin.posts.post-show', compact('posts'));
    }

}
