<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class BlogPosts extends Component
{
    public $searchDate;

    public function render()
    {
        $query = Post::query();

        // Filtrar por fecha si hay una búsqueda
        if ($this->searchDate) {
            $query->whereDate('published_at', $this->searchDate);
        }

        $posts = $query->orderBy('published_at', 'desc')->get();

        return view('livewire.blog-posts', [
            'posts' => $posts,
        ])->layout('layouts.app');
    }
}