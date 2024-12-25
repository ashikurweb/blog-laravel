<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/{user}/post', [PostController::class, 'userPosts'])->name('user-post');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.post-show');


Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/posts/create', [PostController::class, 'create'])->name('admin.posts.post-create');
    Route::get('/admin/posts/show', [AdminController::class, 'show'])->name('admin.posts.post-show');
    Route::delete('/admin/posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
    Route::get('/admin/posts/edit/{post}', [PostController::class, 'edit'])->name('admin.posts.edit');

    Route::get('/admin/user', [ProfileController::class, 'index'])->name('admin.user');
    Route::put('/admin/user', [ProfileController::class, 'update'])->name('admin.user.update');
    Route::get('/admin/users', [ProfileController::class, 'show'])->name('admin.user.show');
    Route::delete('/admin/user', [ProfileController::class, 'destroy'])->name('admin.user.destroy');

    Route::put('/admin/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::post('admin/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});
