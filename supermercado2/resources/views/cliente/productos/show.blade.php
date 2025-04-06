<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $producto->nombre }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 0;
        }
        .btn {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }
        .col-md-6 {
            flex: 1;
            min-width: 45%;
        }
        .img-fluid {
            max-width: 100%;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }
        .img-fluid:hover {
            transform: scale(1.05);
        }
        h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 10px;
            transition: color 0.3s ease;
        }
        h2:hover {
            color: #007bff;
        }
        p {
            font-size: 1rem;
            color: #555;
            line-height: 1.6;
        }
        .text-muted {
            color: #777;
        }
        h4 {
            font-size: 1.5rem;
            color: #333;
            font-weight: bold;
        }
        .form-group label {
            font-size: 1rem;
            color: #333;
        }
        .form-group input {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }
        .form-group button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 1rem;
            border: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .form-group button:hover {
            background-color: #218838;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('productos.index') }}" class="btn mb-4">← Volver al catálogo</a>

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
                
                    <button type="submit" class="btn mt-2">🛒 Agregar al carrito</button>
                </form>                
            </div>
        </div>
    </div>
</body>
</html>
