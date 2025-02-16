<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use PHPUnit\Framework\Attributes\Test;

class UserTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function a_user_can_register_and_is_inactive_by_default()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'is_active' => false, // Aseguramos que se registre como inactivo
        ]);

        $response->assertRedirect('/login');
    }

    #[Test]
    public function only_admins_can_access_users_management()
    {
        $user = User::factory()->create(['is_admin' => false]); // Usuario normal
        $admin = User::factory()->create(['is_admin' => true]); // Usuario admin

        // Usuario normal intenta acceder → Debe fallar
        $response = $this->actingAs($user)->get('/admin/users');
        $response->assertForbidden();

        // Admin intenta acceder → Debe funcionar
        $response = $this->actingAs($admin)->get('/admin/users');
        $response->assertStatus(200);
    }
}