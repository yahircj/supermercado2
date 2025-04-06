<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Pedidos</title>
</head>
<body>
    <h2>Mis Pedidos</h2>

    @foreach($pedidos as $pedido)
        <div>
            <a href="{{ route('perfil.showPedido', $pedido->id) }}">
                Pedido #{{ $pedido->id }} - Estatus: {{ $pedido->estatus }}
            </a>
        </div>
    @endforeach
</body>
</html>
