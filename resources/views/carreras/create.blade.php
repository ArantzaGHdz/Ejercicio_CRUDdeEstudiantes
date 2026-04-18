@extends('layouts.app')

<!-- Form para crear un nuevo registro de carrera -->
@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>
    <form action="{{ route('carreras.store') }}" method="POST" class="bg-white shadow rounded p-6 space-y-4">
        @csrf
        <!-- Apartado para escribir el nombre de la carrera -->
        <div>
            <label class="block font-semibold">Nombre</label>
            <input type="text" name="nombre" class="w-full border rounded px-3 py-2" required>
        </div>

        <!-- Apartado para escribir la descripción de la carrera -->
        <div>
            <label class="block font-semibold">Descripción</label>
            <textarea name="descripcion" class="w-full border rounded px-3 py-2" rows="4" required></textarea>
        </div>

        <!-- Boton para guardar los datos descritos en sus respectivos apartados -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 cursor-pointer">
            Guardar
        </button>

        <!-- Link estilo boton para cancelar el proceso de añadir una nueva carrera -->
        <a href="{{ route('carreras.index') }}" 
            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 cursor-pointer">
            Cancelar
        </a>
    </form>
</div>
@endsection
