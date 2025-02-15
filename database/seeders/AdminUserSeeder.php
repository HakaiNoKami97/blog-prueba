<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Reemplaza con el correo que prefieras
            [
                'name' => 'Admin',
                'password' => Hash::make('password123'), // Cambia la contraseña si es necesario
                'role' => 'admin', // Asegúrate de manejar roles en tu modelo User
                'email_verified_at' => now(),
            ]
        );
    }
}