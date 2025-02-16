<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CreatePost extends Component
{
    public $title;
    public $description;

    public function mount()
    {
        if (!Auth::user()->is_active) {
            abort(403, 'No tienes permiso para crear publicaciones.');
        }
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Post::create([
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => Auth::id(),
            'published_at' => now(),
        ]);

        return redirect()->route('home')->with('message', 'Publicación creada exitosamente.');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}