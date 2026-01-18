<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="/login">
        <!-- genera un token de seguridad para evitar que el middleware VerifyCsrfToken que hay por defecto en el post bloquee la petición /vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/VerifyCsrfToken.php -->
        @csrf
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div><br>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div><br>
        <button type="submit">Iniciar Sesión</button>
    </form>
    <br>
    <a href="/register">Registrarse</a>
</body>
</html>
