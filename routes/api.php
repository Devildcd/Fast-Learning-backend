<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// rutas protegidas de materias
Route::get('/materias', 'App\Http\Controllers\MateriaController@index');
Route::get('/materia/{id}', 'App\Http\Controllers\MateriaController@show');
Route::post('/materia', 'App\Http\Controllers\MateriaController@store');
Route::put('/materia/{id}', 'App\Http\Controllers\MateriaController@update');
Route::delete('/materia/{id}', 'App\Http\Controllers\MateriaController@destroy');

// rutas protegidas de contenidos
Route::get('/contenidos/{id}', 'App\Http\Controllers\ContenidoController@contenidos');
Route::get('/contenido/{id}', 'App\Http\Controllers\ContenidoController@show');
Route::post('/contenido', 'App\Http\Controllers\ContenidoController@store');
Route::put('/contenido/{id}', 'App\Http\Controllers\ContenidoController@update');
Route::delete('/contenido/{id}', 'App\Http\Controllers\ContenidoController@destroy');
