<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materia::all();

        return response()->json($materias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Materia::rules());

        if ($validator->fails()) {
            return response([
                'message' => 'Error de validacion',
                'error' => $validator->errors()
            ], 422);
        }

        $materia = new Materia();
        $materia->fill($request->all());
        $materia->save();

        return response()->json([
            'message' => 'Exito, creado exitosamente',
            'contenido' => $materia
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $materia = Materia::findOrFail($id);
        
        if(!$materia){
            return response()->json([
                'message' => 'No encontrado'
            ], 404);
        }

        return response()->json($materia);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $materia = Materia::findOrFail($id);
        if(!$materia){
            return response()->json([
                'message' => 'No encontrado'
            ], 404);
        }

        $validator = Validator::make($request->all(), Materia::rules());
        if($validator->fails()){
            return response([
                'message' => 'Error de validacion',
                'error' => $validator->errors()
            ], 422);
        }

        $materia->update($request->all());
        $materia->save();

        return response()->json([
            'message' => 'Exito, actualizado exitosamente',
            'contenido' => $materia
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materia = Materia::findOrFail($id);
        if (!$materia) {
            return response()->json([
                'message' => 'No encontrado'
            ], 404);
        }

        $materia->delete();
    }

    // Obtener Contenidos de una Materia
    public function contenidosMateriaId($id) 
    {
        $materia = Materia::findOrFail($id);

        $contenidosMateria = $materia->contenidos;

        return response()->json($contenidosMateria);
    }
}
