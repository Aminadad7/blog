<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeUserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return ["Cantidad de user"=> $users->count()+1 ,"data"=>$users];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        
        // --- ENVIAR CORREO AQUÍ ---
        // Mail::to($user->email)->send(new WelcomeUserMail($user));
        try {
    $user->save();
    Mail::to($user->email)->send(new WelcomeUserMail($user));
} catch (\Exception $e) {
    // Esto te dirá exactamente por qué falló el envío
    return response()->json([
        "error" => "Error al enviar correo",
        "detalle" => $e->getMessage()
    ], 500);
}
        return response()->json($user, 201); 
        } catch (\Exception $e) {
            return response()->json(["message" => "Error creating user", "error" => $e->getMessage()], 500);
        }       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!User::find($id)) {
            return response()->json(["message" => "User not found"], 404);
        }
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(["message" => "User not found"], 404);
        }
        $user->name = $request->input('name', $user->name);
        $user->email = $request->input('email', $user->email);
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();
        return response()->json($user, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(["message" => "User not found"], 404);
        }
        $user->delete();
        return response()->json(["message"=>"User erased"], 200);
    }


// ... dentro de la clase UserController

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    // Verificamos si el usuario existe y si la contraseña coincide
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Credenciales incorrectas'
        ], 401);
    }

    // Creamos el token para el usuario
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'Login exitoso',
        'access_token' => $token,
        'token_type' => 'Bearer',
        'user' => $user
    ]);
}
public function logout(Request $request)
{
   // Esto borra absolutamente todos los tokens de este usuario
    $request->user()->tokens()->delete();

    return response()->json([
        'message' => 'Todas las sesiones han sido cerradas'
    ], 200);
}
}
