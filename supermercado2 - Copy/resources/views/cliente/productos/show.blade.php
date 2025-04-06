<!DOCTYPE html>
<html>
<head>
    <title>{{ $producto->nombre }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <a href="{{ route('productos.index') }}" class="btn btn-secondary mb-4">← Volver al catálogo</a>

        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/' . $producto->imagen) }}" class="img-fluid" alt="{{ $producto->nombre }}">
            </div>
            <div class="col-md-6">
                <h2>{{ $producto->nombre }}</h2>
                <p class="text-muted">Categoría: {{ $producto->categoria }}</p>
                <p>{{ $producto->descripcion }}</p>
                <h4>${{ number_format($producto->precio, 2) }}</h4>
                <p>Stock disponible: {{ $producto->stock }}</p>
                <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                    @csrf
                
                    <div class="form-group">
                        <label for="cantidad">Cantidad:</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control" value="1" min="1" required>
                    </div>
                
                    <button type="submit" class="btn btn-primary mt-2">🛒 Agregar al carrito</button>
                </form>                
                
            </div>
        </div>
    </div>
</body>
</html>
