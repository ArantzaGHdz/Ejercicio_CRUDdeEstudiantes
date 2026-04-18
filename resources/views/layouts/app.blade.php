<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistema de registro estudiantil' }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Barra de navegación entre la tabla de estudiantes y la tabla de carreras -->
    <nav class="bg-blue-800 text-white px-6 py-4 flex justify-between items-center">
        <!-- Nombre del sitio -->
        <div class="text-2xl font-bold">
            Sistema de registro estudiantil
        </div>

        <!-- Links para cambiar de vista entre el index de estudiantes y el index de carreras -->
        <div class="space-x-4 mr-10 text-lg">
            <a href="{{ route('index') }}" class="hover:underline">Estudiantes</a>
            <a href="{{ route('carreras.index') }}" class="hover:underline">Carreras</a>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="container mx-auto mt-8 px-4">
        @yield('content')
    </main>
</body>
</html>

