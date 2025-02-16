<div class="max-w-4xl mx-auto mt-10">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Publicaciones del Blog</h1>

        <!-- Botón para ir a la vista de inicio de sesión en una nueva pestaña -->
        <a href="{{ route('login') }}" target="_blank" class="border border-black text-black py-2 px-4 rounded transition duration-300 hover:bg-black hover:text-white">
            Iniciar Sesión
        </a>
    </div>

    <!-- Mostrar botón de crear publicación si el usuario está autenticado y activo -->
    @if(auth()->check() && auth()->user()->is_active)
        <div class="mb-4">
            <a href="{{ route('posts.create') }}" class="bg-green-500 text-white py-2 px-4 rounded">
                Crear Publicación
            </a>
        </div>
    @endif

    <!-- Campo de búsqueda por fecha -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Buscar por fecha:</label>
        <input type="date" wire:model="searchDate" class="border rounded p-2 w-full">
    </div>

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