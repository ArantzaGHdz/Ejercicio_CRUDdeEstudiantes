@extends('layouts.app')

<!-- Página que muestra los datos de la carrera previamente seleccionada en la tabla -->
@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>
    <div class="bg-white shadow rounded p-6">
        <p><strong>Nombre:</strong> {{ $carrera->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $carrera->descripcion }}</p>
    </div>

    <!-- Link estilo botón para volver a la página con la tabla de carreras -->
    <a href="{{ route('carreras.index') }}" 
       class="mt-4 inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
       Volver
    </a>
</div>
@endsection
