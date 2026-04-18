@extends('layouts.app')

<!-- Form para editar un registro existente de carrera previamente seleccionada en la tabla-->
@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>
    <form action="{{ route('carreras.update', $carrera->id) }}" method="POST" class="bg-white shadow rounded p-6 space-y-4">
        @csrf
        @method('PUT')
        <!-- Apartado para editar el nombre de la carrera -->
        <div>
            <label class="block font-semibold">Nombre</label>
            <input type="text" name="nombre" value="{{ $carrera->nombre }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <!-- Apartado para editar la descripción de la carrera -->
        <div>
            <label class="block font-semibold">Descripción</label>
            <textarea name="descripcion" class="w-full border rounded px-3 py-2" rows="4" required>{{ $carrera->descripcion }}</textarea>
        </div>

        <!-- Boton para guardar los cambios realizados a los datos en sus respectivos apartados -->
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 cursor-pointer">
            Actualizar
        </button>

        <!-- Link estilo boton para cancelar el proceso de editar la carrera seleccionada -->
        <a href="{{ route('carreras.index') }}" 
            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 cursor-pointer">
            Cancelar
        </a>
    </form>
</div>
@endsection
