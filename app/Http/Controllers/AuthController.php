<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function register(Request $request): RedirectResponse
    {
        $name = trim((string) $request->input('name'));
        $lastName = trim((string) $request->input('last_name'));
        $email = trim((string) $request->input('email'));
        $password = trim((string) $request->input('password'));

        // Comprobar si el email ya existe
        if (User::where('email', $email)->exists()) {
            return redirect('/register')->with('error', 'Este email ya está registrado.');
        }

        $user = User::create([
            'name' => $name,
            'last_name' => $lastName,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        Auth::login($user);

        return redirect('/home');
    }

    public function login(Request $request): RedirectResponse
    {
        $email = trim((string) $request->input('email'));
        $password = trim((string) $request->input('password'));

        $credentials = [
            'email' => $email,
            'password' => $password,
        ];

        if (Auth::attempt($credentials)) { // del propio Laravel para comprobar que los datos de user son correctos comparandolos con la base de datos
            // Redirigir según el rol del usuario
            if (Auth::user()->role === 'administrador') {
                return redirect('/home_admin');
            } else {
                return redirect('/home');
            }
        }

        return redirect('/')->with('error', 'Correo o contraseña incorrectos.');
    }

    public function home(): View
    {
        return view('home');
    }

    public function homeAdmin(): View
    {
        if (Auth::user()->role !== 'administrador') {
            abort(403); // en caso de que no sea admin, saldrá la página de permisos denegados
        }

        $users = User::query()->select(['id', 'name', 'last_name', 'email', 'role'])->orderBy('id')->get();

        return view('home_admin', [
            'users' => $users,
        ]);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout(); // del propio Laravel para cerrar la sesión del usuario

        return redirect('/');
    }
}
