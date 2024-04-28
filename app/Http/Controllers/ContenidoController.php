<?php

namespace App\Http\Controllers;

use App\Models\Contenido;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function contenidos($id) 
    {
        $materia = Materia::findOrFail($id);

        $contenidosMateria = $materia->contenidos;

        return response()->json($contenidosMateria);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Contenido::rules());

        if ($validator->fails()) {
            return response([
                'message' => 'Error de validacion',
                'error' => $validator->errors()
            ], 422);
        }

        $contenido = new Contenido();
        $contenido->fill($request->all());
        $contenido->save();

        return response()->json([
            'message' => 'Exito, creado exitosamente',
            'contenido' => $contenido
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contenido = Contenido::with('contenidos')->findOrFail($id);
        
        if(!$contenido){
            return response()->json([
                'message' => 'No encontrado'
            ], 404);
        }

        return response()->json($contenido);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contenido = Contenido::findOrFail($id);
        if(!$contenido){
            return response()->json([
                'message' => 'No encontrado'
            ], 404);
        }

        $validator = Validator::make($request->all(), Contenido::rules());
        if($validator->fails()){
            return response([
                'message' => 'Error de validacion',
                'error' => $validator->errors()
            ], 422);
        }

        $contenido->update($request->all());
        $contenido->save();

        return response()->json([
            'message' => 'Exito, actualizado exitosamente',
            'contenido' => $contenido
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contenido = Contenido::findOrFail($id);
        if (!$contenido) {
            return response()->json([
                'message' => 'No encontrado'
            ], 404);
        }

        $contenido->delete();
    }
}
