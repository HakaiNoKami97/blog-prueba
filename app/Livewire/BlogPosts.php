<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class BlogPosts extends Component
{
    public $searchDate;

    public function mount()
    {
        // Si el usuario no está autenticado o no tiene permisos, lo redirigimos con error
        if (!Auth::check() || !Auth::user()->is_active) {
            return redirect()->back()->with('error', 'No tienes permisos para acceder.');
        }
    }

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

    public function restrictedAction()
    {
        // Si el usuario no es admin, le negamos el acceso
        if (!Auth::user()->is_admin) {
            return redirect()->back()->with('error', 'No tienes permisos para acceder.');
        }

        // Acción restringida aquí...
    }
}