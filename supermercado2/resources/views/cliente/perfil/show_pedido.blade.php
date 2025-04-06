<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Pedido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgba(143, 195, 216, 0.81);;
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
            margin-bottom: 30px;
        }
        .container {
            width: 80%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .producto {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
            padding: 15px;
            transition: background-color 0.3s ease;
        }
        .producto:hover {
            background-color: #e3f2fd;
        }
        .producto a {
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
            font-weight: bold;
            display: block;
        }
        .producto a:hover {
            color: #0056b3;
        }
        .producto .precio {
            color: #555;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Detalles del Pedido #{{ $pedido->id }}</h2>

        @foreach($pedido->productos as $producto)
            <div class="producto">
                <a href="{{ route('productos.show', $producto->id) }}">
                    Producto: {{ $producto->nombre }}
                </a>
                <div class="precio">
                    Precio: ${{ $producto->precio }}
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
