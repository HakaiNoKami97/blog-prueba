<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Ajusta según tu configuración -->
    @livewireStyles
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        {{ $slot }} <!-- Aquí se renderizará el contenido de Livewire -->
    </div>
    @livewireScripts
</body>
</html>