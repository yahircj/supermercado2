<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pedidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .container {
            width: 80%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .pedido {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
            padding: 15px;
            transition: background-color 0.3s ease;
        }
        .pedido:hover {
            background-color: #e3f2fd;
        }
        .pedido a {
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
            font-weight: bold;
            display: block;
        }
        .pedido a:hover {
            color: #0056b3;
        }
        .pedido .estatus {
            color: #777;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Mis Pedidos</h2>

        @foreach($pedidos as $pedido)
            <div class="pedido">
                <a href="{{ route('perfil.showPedido', $pedido->id) }}">
                    Pedido #{{ $pedido->id }} 
                    <span class="estatus">- Estatus: {{ $pedido->estatus }}</span>
                </a>
            </div>
        @endforeach
    </div>
</body>
</html>
