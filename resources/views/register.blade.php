<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h1 class="text-center mb-4">Registro</h1>
                        <form method="POST" action="/register">
                            <!-- genera un token de seguridad para evitar que el middleware VerifyCsrfToken que hay por defecto en el post bloquee la petición /vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/VerifyCsrfToken.php -->
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nombre:</label>
                                <input type="text" name="name" required class="form-control">
                            </div><br>
                            <div class="mb-3">
                                <label class="form-label">Apellidos:</label>
                                <input type="text" name="last_name" required class="form-control">
                            </div><br>
                            <div class="mb-3">
                                <label class="form-label">Email:</label>
                                <input type="email" name="email" required class="form-control">
                            </div><br>
                            <div class="mb-3">
                                <label class="form-label">Password:</label>
                                <input type="password" name="password" required class="form-control">
                            </div><br>
                            <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                        </form>
                        <br>
                        <a href="/" class="d-block text-center">Inicia sesión</a>
                        <br><br>
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
