<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\BlogPosts;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Admin\Users;
use App\Livewire\CreatePost;
use App\Livewire\ApiPosts;
use App\Services\JsonPlaceholderService;

Route::get('/', BlogPosts::class);
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

// Ruta protegida para usuarios autenticados y administradores
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/users', Users::class)->name('admin.users');
});

// Ruta protegida para usuarios autenticados (creación de publicaciones)
Route::middleware(['auth'])->group(function () {
    Route::get('/posts/create', CreatePost::class)->name('posts.create');
});

// Ruta para consumir la API externa
Route::get('/api/posts', function (JsonPlaceholderService $service) {
    return response()->json($service->getPosts());
});

// Ruta para mostrar el componente Livewire que usa la API
Route::get('/api-posts', ApiPosts::class)->name('api.posts');