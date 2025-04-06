<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">

        <!-- Carrito de compras -->
        <a href="{{ route('carrito.index') }}" class="btn btn-outline-success mb-3">
            🛒 Ver carrito
        </a>

        <!-- Perfil del usuario -->
        <a href="{{ route('perfil.index') }}" class="btn btn-outline-primary">
            <i class="bi bi-person-circle"></i> Perfil
        </a>

        <h1 class="mb-4">Catálogo de Productos</h1>

        <!-- Filtros de búsqueda -->
        <form method="GET" class="row mb-4">
            <div class="col-md-4">
                <input type="text" name="buscar" class="form-control" placeholder="Buscar producto..." value="{{ request('buscar') }}">
            </div>
            <div class="col-md-4">
                <select name="categoria" class="form-select">
                    <option value="">Todas las categorías</option>
                    @if (!empty($categorias) && count($categorias) > 0)
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria }}" {{ request('categoria') == $categoria ? 'selected' : '' }}>
                                {{ $categoria }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-4 d-flex">
                <button type="submit" class="btn btn-primary me-2">Filtrar</button>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">Limpiar</a>
            </div>
        </form>

        <!-- Productos -->
        <div class="row">
            @foreach ($productos as $producto)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text">${{ number_format($producto->precio, 2) }}</p>
                            <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-center">
            {{ $productos->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
