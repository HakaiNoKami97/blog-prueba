<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\BlogPosts;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;

Route::get('/', BlogPosts::class);
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');