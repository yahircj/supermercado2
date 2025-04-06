<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Pedido</title>
</head>
<body>
    <h2>Detalles del Pedido #{{ $pedido->id }}</h2>

    @foreach($pedido->productos as $producto)
        <div>
            <a href="{{ route('productos.show', $producto->id) }}">
                Producto: {{ $producto->nombre }} - Precio: ${{ $producto->precio }}
            </a>
        </div>
    @endforeach
</body>
</html>
