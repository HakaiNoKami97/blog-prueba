<div class="max-w-4xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-4">Publicaciones del Blog</h1>

    <!-- Campo de búsqueda por fecha -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Buscar por fecha:</label>
        <input type="date" wire:model="searchDate" class="border rounded p-2 w-full">
    </div>

    <!-- Lista de publicaciones -->
    @foreach($posts as $post)
        <div class="bg-white shadow-md rounded-lg p-4 mb-4">
            <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
            <p class="text-gray-600">{{ $post->description }}</p>
            <span class="text-sm text-gray-500">
                Publicado el {{ $post->published_at ? $post->published_at->format('d/m/Y') : 'Sin fecha' }}
            </span>
        </div>
    @endforeach
</div>