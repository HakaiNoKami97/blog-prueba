<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class BlogPosts extends Component
{
    public function render()
    {
        $posts = Post::orderBy('published_at', 'desc')->get();

        return view('livewire.blog-posts', [
            'posts' => $posts, // Pasar la variable a la vista
        ])->layout('layouts.app'); // Aplicar el layout
    }
}