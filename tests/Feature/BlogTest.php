<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use PHPUnit\Framework\Attributes\Test;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function only_active_users_can_create_posts()
    {
        // Crear un usuario inactivo
        $user = User::factory()->create(['is_active' => false]);

        // Intentar crear un post
        $response = $this->actingAs($user)->post('/posts/create', [
            'title' => 'Nuevo Post',
            'description' => 'Contenido del post',
        ]);

        // Debe fallar porque el usuario es inactivo
        $response->assertForbidden();
    }
}