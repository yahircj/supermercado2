<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2>Mi Perfil</h2>

    <!-- Mensajes de éxito o error -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="mb-3">
        <strong>Nombre:</strong> {{ $cliente->nombre }}
    </div>
    <div class="mb-3">
        <strong>Correo:</strong> {{ $cliente->correo }}
    </div>
    <div class="mb-3">
        <strong>Teléfono:</strong> {{ $cliente->telefono }}
    </div>
    <div class="mb-3">
        <strong>Dirección:</strong> {{ $cliente->direccion }}
    </div>

    <!-- Botones para Mis Pedidos y Historial -->
    <div class="mt-4">
        <a href="{{ route('mis.pedidos', $cliente->id) }}" class="btn btn-info">Mis Pedidos</a>
        <a href="{{ route('historial.pedidos', $cliente->id) }}" class="btn btn-secondary">Historial de Pedidos</a>
    </div>

    <div class="mt-3">
        <a href="{{ route('perfil.edit', $cliente->id) }}" class="btn btn-primary">Editar Perfil</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

