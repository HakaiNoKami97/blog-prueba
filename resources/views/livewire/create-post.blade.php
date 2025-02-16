<div class="max-w-2xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-4">Crear nueva publicación</h1>

    <form wire:submit.prevent="save" class="bg-white shadow-md rounded-lg p-4">
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" wire:model="title" class="border rounded p-2 w-full">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea wire:model="description" class="border rounded p-2 w-full"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">
            Publicar
        </button>
    </form>
</div>