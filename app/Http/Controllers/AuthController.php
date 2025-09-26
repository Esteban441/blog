<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostrar formulario de registro
    public function showRegister()
    {
        return view('auth.register');
    }
    // Procesar registro
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encriptamos
        ]);
        return redirect()->route('login.form')->with('success', 'El usuario se registró con éxito.');
    }
    // Mostrar formulario de login
    public function showLogin()
    {
        return view('auth.login');
    }
    // Procesar login
    public function login(Request $request)
    {
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate(); // evita ataques de sesión
            return redirect()->intended('/'); // a donde quieras dirigirlo
        }
        return back()->withErrors([
            'email' => 'Las credenciales no son correctas.',
        ]);
    }
    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
