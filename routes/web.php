<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login'); // asigna el nombre 'login' a la ruta para que el middleware('auth') pueda redirigir a esta ruta cuando un usuario no autenticado intente acceder a un sitio que requiere autenticación

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [AuthController::class, 'register']);

Route::get('/home', [AuthController::class, 'home'])->middleware('auth'); // middleware del propio Laravel para verificar si el usuario está autenticado

Route::get('/home_admin', [AuthController::class, 'homeAdmin'])->middleware('auth');

Route::get('/logout', [AuthController::class, 'logout']); // del propio Laravel para cerrar la sesión del usuario
