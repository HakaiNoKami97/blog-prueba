<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class JsonPlaceholderService
{
    protected $baseUrl = 'https://jsonplaceholder.typicode.com';

    public function getPosts()
    {
        return Http::get("{$this->baseUrl}/posts")->json();
    }

    public function getPost($id)
    {
        return Http::get("{$this->baseUrl}/posts/{$id}")->json();
    }

    public function createPost($data)
    {
        return Http::post("{$this->baseUrl}/posts", $data)->json();
    }

    public function updatePost($id, $data)
    {
        return Http::put("{$this->baseUrl}/posts/{$id}", $data)->json();
    }

    public function deletePost($id)
    {
        return Http::delete("{$this->baseUrl}/posts/{$id}")->json();
    }
}