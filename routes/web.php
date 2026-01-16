<?php
use Illuminate\Support\Facades\Route;

// Opción A: Devolver un mensaje de estado simple
Route::get('/', function () {
    return response()->json(['status' => 'API Running', 'version' => '1.0']);
});

// Opción B: Si no quieres que nadie acceda por web, borra todo el contenido