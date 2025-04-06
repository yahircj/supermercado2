<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-white p-5">
    <div class="container">
        <h1>¡Bienvenido, {{ Auth::user()->name }}!</h1>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger mt-3">Cerrar sesión</button>
        </form>
    </div>
</body>
</html>
