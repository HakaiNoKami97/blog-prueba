<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">Publicaciones de la API</h2>

    <input type="text" wire:model="search" class="border p-2 w-full mb-4" placeholder="Buscar por título...">

    <ul>
        @foreach ($posts as $post)
            <li class="border-b py-2">
                <h3 class="font-semibold">{{ $post['title'] }}</h3>
                <p>{{ $post['body'] }}</p>
            </li>
        @endforeach
    </ul>
</div>