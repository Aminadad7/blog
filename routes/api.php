<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Models\Post;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas públicas
Route::apiResource('posts', PostController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('comments', CommentController::class);   
Route::apiResource('users', \App\Http\Controllers\UserController::class);
Route::post('/login', [UserController::class, 'login']);
 

Route::get('/posts/{post}/comments', function (Post $post) {
    try {
        // Esto confirmará si Laravel encuentra el post y sus comentarios
        return response()->json([
            'post_id' => $post->id,
           'comentarios' => $post->comments->map(function ($comment) {
        return [
            'quien_comento' => $comment->name,
            'mensaje' => $comment->content
        ];
    }) // Aquí es donde suele fallar si no hay relación
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ], 500);
    }
});
//RUTAS PROTEGIDAS - REQUIEREN AUTENTICACIÓN
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/users', [UserController::class, 'index']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    // Aquí puedes poner el resto de tu CRUD
    Route::post('/posts', [PostController::class, 'store']);
    Route::put('/posts/{id}', [PostController::class, 'update']);
    Route::delete('/posts/{id}', [PostController::class, 'destroy']);
    Route::post('/categories', [CategoryController::class, 'store']);
});