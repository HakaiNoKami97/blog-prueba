<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\BlogPosts;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Admin\Users;

Route::get('/', BlogPosts::class);
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

// Ruta protegida para usuarios autenticados y administradores
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/users', Users::class)->name('admin.users');
});