<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Users extends Component
{
    public function render()
    {
        // Solo el administrador puede ver esta vista
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Acceso no autorizado');
        }

        return view('livewire.admin.users', [
            'users' => User::where('role', '!=', 'admin')->get(),
        ]);
    }

    public function toggleStatus($userId)
    {
        $user = User::findOrFail($userId);
        $user->is_active = !$user->is_active;
        $user->save();
    }
}