<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Response;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 1. Iniciamos la consulta
        
    $query = Post::query();

    // 2. Si el usuario envió el parámetro 'search'
    if ($request->has('search')) {
        $search = $request->input('search');
        
        $query->where(function($q) use ($search) {
            $q->where('title', 'LIKE', "%{$search}%");
            //   ->orWhere('content', 'LIKE', "%{$search}%");
        });
    }
    $query->where('is_active', true);
    // 3. Retornamos los resultados (puedes añadir paginación con paginate())
    return response()->json($query->get());
        // listar todos los posts activos
        // $posts = Post::all()->where('is_active', true);
        // return $posts;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
    $post = new Post();
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    
    // AQUÍ ESTÁ EL TRUCO:
    // Sacamos el ID del usuario que está logueado gracias al Token
    $post->user_id = $request->user()->id; 
    
    $post->category_id = $request->input('category_id');

    if ($request->hasFile('image')) {
        $post->image = $request->file('image')->store('posts', 'public');
    }
        // 3. Guardar la ruta en la base de datos
       
        $post->save();
        return response()->json($post, 201);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = Post::find($post->id);
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        // Cargamos la relación 'comments' antes de retornar
         return response()->json($post->load('comments'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        
        $post->title =  $request->input('title' , $post->title);
        $post->content = $request->input('content', $post->content);
        $post->image = $request->input('image', $post->image);
        $post->user_id = $request->input('user_id' , $post->user_id);
        $post->category_id = $request->input('category_id', $post->category_id);
         // --- NUEVO CÓDIGO PARA LA IMAGEN ---
    if ($request->hasFile('image')) {
        // 1. Obtener el archivo
        $file = $request->file('image');
        
        // 2. Guardarlo en la carpeta 'storage/app/public/posts'
        // El método store() genera un nombre único automáticamente
        $path = $file->store('posts', 'public');
        
        // 3. Guardar la ruta en la base de datos
        $post->image = $path;
        
        
    }
        $post->save();
        return response()->json($post, 200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();   
        return response()->json(["message"=>"Borrado"], 200);
    }
}
