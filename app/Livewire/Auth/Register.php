<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation, $birthdate;

    public function register()
    {
        // Validación
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'birthdate' => 'required|date|before:' . now()->subYears(18)->format('Y-m-d'), // Debe ser mayor de 18 años
        ]);

        // Crear usuario con estado inactivo
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'birthdate' => $this->birthdate,
            'status' => 'inactive', // Estado inicial inactivo
        ]);

        session()->flash('message', 'Registro exitoso. Espera la activación por un administrador.');

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.app');
    }
}