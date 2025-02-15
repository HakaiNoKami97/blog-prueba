<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Iniciar Sesión</h2>

    @if (session()->has('error'))
        <div class="p-3 mb-4 text-red-600 bg-red-100 border border-red-400 rounded">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="login">
        <div class="mb-4">
            <label class="block">Correo Electrónico</label>
            <input type="email" wire:model="email" class="border rounded p-2 w-full">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block">Contraseña</label>
            <input type="password" wire:model="password" class="border rounded p-2 w-full">
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Ingresar</button>
    </form>

    <!-- Botón para ir a la vista de registro -->
    <p class="mt-4 text-center text-sm text-gray-600">
        ¿No tienes una cuenta?  
        <a href="{{ route('register') }}" target="_blank" class="text-blue-500 hover:underline">
            Regístrate aquí
        </a>
    </p>
</div>