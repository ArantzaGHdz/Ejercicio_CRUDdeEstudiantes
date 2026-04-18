@extends('layouts.app')

<!-- Página que muestra una tabla con los registros de carreras y un botón para añadir una nueva -->
@section('content')
<div class="container mx-auto px-4">
    <!-- Título de la vista -->
    <h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>

    <!-- Boton para añadir un nuevo registro de carrera-->
    <a href="{{ route('carreras.create') }}" 
       class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-800 ml-3">
       Nueva Carrera
    </a>

    <!-- Mensaje que aparece al añadir un nuevo registro de estudiante -->
    @if(session("success"))
        <div class="bg-blue-200 text-blue-500 border-blue-500 border-1 p-4 mb-5 mt-5"><h1>{{session("success")}}</h1></div>
    @endif

    <!-- Tabla con los datos de cada carrera además de una columna de acciones como editar y eliminar -->
    <table class="table-auto w-full mt-6 mb-15 border-collapse border border-gray-300">
        <thead class="bg-blue-800 text-white">
            <tr>
                <th class="border px-4 py-2">Nombre</th>
                <th class="border px-4 py-2">Descripción</th>
                <th class="border px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <!-- Impresion de los datos por cada registro de carrera -->
        <tbody>
            @foreach($carreras as $carrera)
            <tr class="align-middle">
                <td class="border px-4 py-2 h-16">
                    <!-- Redireccionamiento hacia la vista de detalles de cada carrera -->
                    <a href="{{ route('carreras.details', $carrera->id) }}" 
                       class="text-blue-600 hover:underline">
                       {{ $carrera->nombre }}
                    </a>
                </td>
                <td class="border px-4 py-2 h-16">{{ $carrera->descripcion }}</td>
                <!-- Botones de acciones que redireccionan a la vista de edición del registro y acción de eliminar un registro -->
                <td class="border px-4 py-2 h-16">
                    <div class="flex gap-2 items-center justify-center">
                        <!-- Boton para editar el registro-->
                        <a href="{{ route('carreras.edit', $carrera->id) }}" 
                       class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                       Editar
                    </a>
                    <!-- Boton para eliminar el registro -->
                    <form action="{{ route('carreras.delete', $carrera->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 cursor-pointer">
                            Eliminar
                        </button>
                    </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
