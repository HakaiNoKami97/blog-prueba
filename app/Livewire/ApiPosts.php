<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\JsonPlaceholderService;

class ApiPosts extends Component
{
    public $posts = [];
    public $search = '';

    public function mount(JsonPlaceholderService $service)
    {
        $this->posts = $service->getPosts();
    }

    public function updatedSearch()
    {
        $this->posts = array_filter(
            app(JsonPlaceholderService::class)->getPosts(),
            fn ($post) => stripos($post['title'], $this->search) !== false
        );
    }

    public function deletePost($id)
    {
        // Aquí puedes agregar lógica para eliminarlo desde la API si se permite
        $this->posts = array_filter($this->posts, fn ($post) => $post['id'] !== $id);
    }

    public function render()
    {
        return view('livewire.api-posts', ['posts' => $this->posts]);
    }
}