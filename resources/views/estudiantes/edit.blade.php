@extends('layouts.app')

<!-- Form para editar un registro existente de estudiante previamente seleccionado en la tabla-->
@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>
    <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST" class="bg-white shadow rounded p-6 space-y-4">
        @csrf
        @method('PUT')
        <!-- Apartado para editar el nombre del estudiante -->
        <div>
            <label class="block font-semibold">Nombre Completo</label>
            <input type="text" name="nombreCompleto" id="nombreCompleto" value="{{ $estudiante->nombreCompleto }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <!-- Apartado para editar el correo electrónico del estudiante -->
        <div>
            <label class="block font-semibold">Correo</label>
            <input type="email" name="correo" id="correo" value="{{ $estudiante->correo }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <!-- Apartado para editar el semestre que esta cursando actualmente el estudiante -->
        <div>
            <label class="block font-semibold">Semestre</label>
            <input type="number" name="semestre" id="semestre" min="1" max="9" value="{{ $estudiante->semestre }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <!-- Apartado para re-seleccionar la carrera que esta cursando actualmente el estudiante -->
        <div>
            <label class="block font-semibold">Carrera</label>
            <select name="id_carrera" id="id_carrera" class="w-full border rounded px-3 py-2" required>
                @foreach($carreras as $carrera)
                    <option value="{{ $carrera->id }}" {{ $estudiante->carrera_id == $carrera->id ? 'selected' : '' }}>
                        {{ $carrera->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Boton para guardar los cambios realizados a los datos en sus respectivos apartados -->
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 cursor-pointer">
            Actualizar
        </button>

        <!-- Link estilo boton para cancelar el proceso de editar al estudiante seleccionado -->
        <a href="{{ route('index') }}" 
        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 cursor-pointer">
        Cancelar
        </a>
    </form>
</div>
@endsection
