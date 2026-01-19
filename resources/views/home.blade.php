<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h1 class="text-center mb-4">INFORMACIÓN PERSONAL</h1>
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Usuario:</label>
                                <input type="text" value="{{ Auth::user()->id }}" readonly class="form-control">
                            </div><br>

                            <div class="mb-3">
                                <label class="form-label">Nombre:</label>
                                <input type="text" value="{{ Auth::user()->name }}" readonly class="form-control">
                            </div><br>

                            <div class="mb-3">
                                <label class="form-label">Apellidos:</label>
                                <input type="text" value="{{ Auth::user()->last_name }}" readonly class="form-control">
                            </div><br>

                            <div class="mb-3">
                                <label class="form-label">Email:</label>
                                <input type="email" value="{{ Auth::user()->email }}" readonly class="form-control">
                            </div><br>
                        </form><br>
                        <a href="/logout" class="btn btn-danger w-100">Cerrar Sesión</a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
