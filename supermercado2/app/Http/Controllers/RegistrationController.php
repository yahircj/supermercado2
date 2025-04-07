<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    // Muestra el formulario de registro
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Procesa el formulario de registro y crea un usuario
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users', // Asegurarse de que el email sea único
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // Se encripta automáticamente en el setter del modelo
        ]);

        // Iniciar sesión automáticamente después del registro
        Auth::login($user);

        return redirect()->intended('/productos')->with('success', 'Registro exitoso y sesión iniciada.');
    }
}
