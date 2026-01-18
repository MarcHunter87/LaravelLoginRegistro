<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>INFORMACIÓN PERSONAL</h1>

    <form>
        <div>
            <label>Usuario:</label>
            <input type="text" value="{{ Auth::user()->id }}" readonly>
        </div><br>

        <div>
            <label>Nombre:</label>
            <input type="text" value="{{ Auth::user()->name }}" readonly>
        </div><br>

        <div>
            <label>Apellidos:</label>
            <input type="text" value="{{ Auth::user()->last_name }}" readonly>
        </div><br>

        <div>
            <label>Email:</label>
            <input type="email" value="{{ Auth::user()->email }}" readonly>
        </div><br>
    </form><br>

    <a href="/logout">Cerrar Sesión</a><br>
</body>
</html>
