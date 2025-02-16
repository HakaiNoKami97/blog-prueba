<div class="max-w-6xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Administración de Usuarios</h2>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Nombre</th>
                <th class="border p-2">Correo</th>
                <th class="border p-2">Estado</th>
                <th class="border p-2">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr class="border">
                    <td class="p-2">{{ $user->name }}</td>
                    <td class="p-2">{{ $user->email }}</td>
                    <td class="p-2">
                        <span class="{{ $user->is_active ? 'text-green-600' : 'text-red-600' }}">
                            {{ $user->is_active ? 'Activo' : 'Inactivo' }}
                        </span>
                    </td>
                    <td class="p-2">
                        <button wire:click="toggleStatus({{ $user->id }})"
                            class="px-3 py-1 rounded text-white {{ $user->is_active ? 'bg-red-500' : 'bg-green-500' }}">
                            {{ $user->is_active ? 'Inactivar' : 'Activar' }}
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>