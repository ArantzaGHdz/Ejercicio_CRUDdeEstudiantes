<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use Illuminate\Support\Composer;

class CarreraController extends Controller
{
    // Muestra la tabla con los datos de las carreras: nombre, descripción y un apartado
    // de acciones con botones que permiten editar o eliminar registros
    public function index(){
        $title = "Carreras";
        $carreras = Carrera::all();
        return view('carreras.index', compact('carreras', 'title'));
    }

    // Función utilizada para realizar pruebas con vistas y rutas
    // public function prueba($id){
    //     $message = $id;
    //     $title = "Página de prueba";
    //     return view('prueba', compact('message', 'title'));
    // }

    // Se llega cuando se hace click en el nombre de alguna carrera
    // Muestra los datos de cada registro de carreras dependiendo del nombre seleccionado
    public function details($id){
        $carrera = Carrera::findOrFail($id);
        $title = $carrera->nombre;
        return view('carreras.details', compact('carrera', 'title'));
    }

    // Se llega con el boton de "Nueva Carrera"
    // Muestra el form para crear un registro de una carrera nueva
    public function create (){
        $title = 'Agregar Carrera';
        return view('carreras.create', compact('title'));
    }

    // Almacena los respectivos datos introducidos en el form dentro de la base de datos
    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
        ], [
            'nombre.required' => 'El nombre de la carrera es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'Máximo 255 caracteres.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string' => 'La descripción debe ser texto.',
            'descripcion.max' => 'Máximo 1000 caracteres.',
        ]);

        $carrera = new Carrera();
        $carrera->nombre = $request->nombre;
        $carrera->descripcion = $request->descripcion;
        $carrera->save();

        return redirect()->route('carreras.index')->with('success', '¡Carrera guardada correctamente!');
    }

    // Se llega con el boton de "Editar"
    // Muestra el mismo form de create cuyos campos ya están rellenados con la información del registro de la carrera
    // que se selecciono previamente para editar
    public function edit($id){
        $carrera = Carrera::findOrFail($id);
        $title = "Editar Carrera";
        return view('carreras.edit', compact('carrera', 'title'));
    }

    // Se actualiza la información de la base de datos con los cambios que se hayan realizado a la carrera
    public function update($id, Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
        ]);

        $carrera = Carrera::findOrFail($id);
        $carrera->nombre = $request->nombre;
        $carrera->descripcion = $request->descripcion;
        $carrera->save();

        return redirect()->route('carreras.index')->with('success', '¡Carrera actualizada correctamente!');
    }

    // Funciona con el boton de "Eliminar"
    // Se elimina completamente un registro de carrera al hacer click en un boton
    public function delete($id){
        $carrera = Carrera::findOrFail($id);
        $carrera->delete();

        return redirect()->back()->with('success','Carrera eliminada correctamente');
    }
}