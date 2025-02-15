<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\BlogPosts;

Route::get('/', BlogPosts::class);