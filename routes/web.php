<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::get('/', function () {
    return view('login');
})->name('login'); // asigna el nombre 'login' a la ruta para que el middleware('auth') pueda redirigir a esta ruta cuando un usuario no autenticado intente acceder a un sitio que requiere autenticación

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', function () {
    $name = request('name');
    $lastName = request('last_name');
    $email = request('email');
    $password = request('password');

    $user = User::create([
        'name' => $name,
        'last_name' => $lastName,
        'email' => $email,
        'password' => Hash::make($password),
    ]);

    Auth::login($user);

    return redirect('/home');
});

Route::post('/login', function () {
    $email = request('email');
    $password = request('password');

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
    
    return redirect('/');
});

Route::get('/home', function () {
    return view('home');
})->middleware('auth'); // middleware del propio Laravel para verificar si el usuario está autenticado

Route::get('/home_admin', function () {
    if (Auth::user()->role !== 'administrador') {
        abort(403); // en caso de que no sea admin, saldrá la página de permisos denegados
    }

    $users = User::query()->select(['id', 'name', 'last_name', 'email', 'role'])->orderBy('id')->get();

    return view('home_admin', [
        'users' => $users,
    ]);
})->middleware('auth');

Route::get('/logout', function () {
    Auth::logout(); // del propio Laravel para cerrar la sesión del usuario
    return redirect('/');
});
