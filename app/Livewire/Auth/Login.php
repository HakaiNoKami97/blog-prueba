<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email, $password;

    public function login()
    {
        $credentials = $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard'); // Redirigir después del inicio de sesión
        } else {
            session()->flash('error', 'Correo o contraseña incorrectos.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.app');
    }
}
