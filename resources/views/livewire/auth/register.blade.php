<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Registro</h2>

    @if (session()->has('message'))
        <div class="p-3 mb-4 text-green-600 bg-green-100 border border-green-400 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="register">
        <div class="mb-4">
            <label class="block">Nombre</label>
            <input type="text" wire:model="name" class="border rounded p-2 w-full">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block">Correo Electrónico</label>
            <input type="email" wire:model="email" class="border rounded p-2 w-full">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block">Fecha de Nacimiento</label>
            <input type="date" wire:model="birthdate" class="border rounded p-2 w-full">
            @error('birthdate') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block">Contraseña</label>
            <input type="password" wire:model="password" class="border rounded p-2 w-full">
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block">Confirmar Contraseña</label>
            <input type="password" wire:model="password_confirmation" class="border rounded p-2 w-full">
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Registrarse</button>
    </form>
</div>