<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Estudiante;
use Illuminate\Support\Composer;

class IndexController extends Controller
{
    // Muestra la tabla con los datos de los estudiantes: nombre completo, correo, semestre, carrera y un apartado
    // de acciones con botones que permiten editar o eliminar registros
    public function index()
    {
        $title = "Estudiantes";
        $estudiantes = Estudiante::with('carrera')->get();
        return view('welcome', compact('estudiantes', 'title'));
    }

    // Se llega cuando se hace click en el nombre de algún estudiante
    // Muestra los datos de cada registro de estudiantes dependiendo del nombre seleccionado
    public function details($id)
    {
        $estudiante = Estudiante::with('carrera')->findOrFail($id);
        $title = $estudiante->nombreCompleto;
        return view('estudiantes.details', compact('estudiante', 'title'));
    }

    // Se llega con el boton de "Nuevo Estudiante"
    // Muestra el form para crear un registro de un estudiante nuevo
    public function create()
    {
        $title = 'Agregar Estudiante';
        $carreras = Carrera::all();
        return view('estudiantes.create', compact('title', 'carreras'));
    }

    // Almacena los respectivos datos introducidos en el form dentro de la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombreCompleto' => 'required|string',
            'correo' => 'required',
            'semestre' => 'required',
            'id_carrera' => 'required',
        ],
        [
            'nombreCompleto.required' => 'El nombre del alumno es obligatorio.',
            'nombreCompleto.string' => 'El nombre del alumno debe de ser texto.',
            'nombreCompleto.max' => 'El número de caracteres permitido es de 255.',
            'correo.required' => 'El correo es requerido',
            'semestre.numeric' => 'El semestre debe de ser una cantidad numerica',
            'semestre.min' => 'El stock minimo debe de ser 1',
        ]);

        $estudiante = new Estudiante();
        $estudiante->nombreCompleto = $request->nombreCompleto;
        $estudiante->correo = $request->correo;
        $estudiante->semestre = $request->semestre;
        $estudiante->id_carrera = $request->id_carrera;
        $estudiante->save();

        return redirect()->route('index')->with('success', '¡Estudiante guardado correctamente!');
    }

    // Se llega con el boton de "Editar"
    // Muestra el mismo form de create cuyos campos ya están rellenados con la información del registro del estudiante
    // que se selecciono previamente para editar
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $carreras = Carrera::all();
        $title = "Editar Estudiante";
        return view('estudiantes.edit', compact('estudiante', 'carreras', 'title'));
    }

    // Se actualiza la información de la base de datos con los cambios que se hayan realizado al estudiante
    public function update($id, Request $request)
    {
        $request->validate([
            'nombreCompleto' => 'required|string',
            'correo' => 'required',
            'semestre' => 'required',
            'id_carrera' => 'required',
        ],
        [
            'nombreCompleto.required' => 'El nombre del alumno es obligatorio.',
            'nombreCompleto.string' => 'El nombre del alumno debe de ser texto.',
            'nombreCompleto.max' => 'El número de caracteres permitido es de 255.',
            'correo.required' => 'El correo es requerido',
            'semestre.numeric' => 'El semestre debe de ser una cantidad numerica',
            'semestre.min' => 'El stock minimo debe de ser 1',
        ]);

        $estudiante = Estudiante::findOrFail($id);
        $estudiante->nombreCompleto = $request->nombreCompleto;
        $estudiante->correo = $request->correo;
        $estudiante->semestre = $request->semestre;
        $estudiante->id_carrera = $request->id_carrera;
        $estudiante->save();

        return redirect()->route('index')->with('success', '¡Estudiante actualizado correctamente!');
    }

    // Funciona con el boton de "Eliminar"
    // Se elimina completamente un registro de estudiante al hacer click en un boton
    public function delete($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect()->back()->with('success', 'Estudiante eliminado correctamente');
    }
}
