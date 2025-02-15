<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

return new class extends Migration {
    public function up(): void
    {
        // Verificar si la tabla está vacía antes de insertar el usuario
        if (User::count() == 0) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com', // Cambia según lo necesites
                'password' => Hash::make('password123'), // Cambia la contraseña si es necesario
                'role' => 'admin', // Asegúrate de que la columna 'role' exista
                'email_verified_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        User::where('email', 'admin@example.com')->delete();
    }
};