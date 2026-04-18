@extends('layouts.app')

<!-- Form para crear un nuevo registro de estudiante -->
@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>
    <form action="{{ route('estudiantes.store') }}" method="POST" class="bg-white shadow rounded p-6 space-y-4">
        @csrf
        <!-- Apartado para escribir el nombre del estudiante -->
        <div>
            <label class="block font-semibold">Nombre Completo</label>
            <input type="text" name="nombreCompleto" id="nombreCompleto" class="w-full border rounded px-3 py-2" required>
        </div>

        <!-- Apartado para escribir el correo electrónico del estudiante -->
        <div>
            <label class="block font-semibold">Correo</label>
            <input type="email" name="correo" id="correo" class="w-full border rounded px-3 py-2" required>
        </div>

        <!-- Apartado para escribir el semestre que esta cursando actualmente el estudiante -->
        <div>
            <label class="block font-semibold">Semestre</label>
            <input type="number" name="semestre" id="semestre" min="1" max="9" class="w-full border rounded px-3 py-2" required>
        </div>

        <!-- Apartado para seleccionar la carrera que esta cursando actualmente el estudiante -->
        <div>
            <label class="block font-semibold">Carrera</label>
            <!-- El rango de selección de carrera depende de las que ya existan dentro de la base de datos -->
            <select name="id_carrera" id="id_carrera" class="w-full border rounded px-3 py-2" required>
                @foreach($carreras as $carrera)
                    <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Boton para guardar los datos descritos en sus respectivos apartados -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 cursor-pointer">
            Guardar
        </button>

        <!-- Link estilo boton para cancelar el proceso de añadir un nuevo estudiante -->
        <a href="{{ route('index') }}" 
        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 cursor-pointer">
        Cancelar
        </a>
    </form>
</div>
@endsection
