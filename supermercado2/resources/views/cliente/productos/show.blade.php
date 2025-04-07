<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>{{ $producto->nombre }} | Detalles</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"/>
  <style>
    :root {
      --primary-color: rgb(37, 164, 173);
      --secondary-color: #32cd32;
      --background: rgba(143, 195, 216, 0.81);
      --white: #fff;
      --text-dark: #333;
      --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      --radius: 12px;
      --image-size: 90%;
    }
    body {
      background-color: var(--background);
      font-family: 'Segoe UI', sans-serif;
      color: var(--text-dark);
      margin-top: 60px;
      animation: fadeIn 1s ease-in-out;
    }
    .container {
      background-color: var(--white);
      padding: 2rem;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      margin-top: 80px;
      max-width: 1200px;
      animation: slideIn 0.5s ease-in-out;
    }
    .btn-custom {
      background-color: var(--primary-color);
      color: var(--white);
      border: none;
      border-radius: 10px;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .btn-custom:hover {
      background-color: #2968c8;
      transform: translateY(-2px);
    }
    .img-fluid {
      max-width: var(--image-size);
      border-radius: var(--radius);
      transition: transform 0.3s ease;
      animation: zoomIn 0.5s ease-in-out;
    }
    .img-fluid:hover {
      transform: scale(1.05);
    }
    h2 {
      font-size: 2rem;
      font-weight: bold;
      color: var(--primary-color);
      margin-bottom: 1rem;
      transition: color 0.3s ease;
    }
    h2:hover {
      color: #2968c8;
    }
    p {
      font-size: 1rem;
      color: var(--text-dark);
      line-height: 1.6;
    }
    .form-label {
      font-weight: 600;
    }
    .form-control {
      border-radius: var(--radius);
      border: 1px solid #ddd;
      transition: border-color 0.3s ease;
    }
    .form-control:focus {
      border-color: var(--primary-color);
      outline: none;
    }
    .card {
      border: none;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
    }

    @keyframes fadeIn {
      0% { opacity: 0; }
      100% { opacity: 1; }
    }

    @keyframes slideIn {
      0% { transform: translateY(20px); opacity: 0; }
      100% { transform: translateY(0); opacity: 1; }
    }

    @keyframes zoomIn {
      0% { transform: scale(0.9); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }
  </style>
</head>
<body>
  <div class="container">
    <a href="{{ route('productos.index') }}" class="btn btn-secondary mb-3">
      <i class="bi bi-arrow-left"></i> Volver al catálogo
    </a>

    <div class="row g-4">
      <div class="col-md-6 d-flex justify-content-center">
        <img src="{{ asset('images/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-fluid">
      </div>
      <div class="col-md-6">
        <h2>{{ $producto->nombre }}</h2>
        <p class="text-muted">Categoría: {{ ucfirst($producto->categoria) }}</p>
        <p>{{ $producto->descripcion }}</p>
        <h4 class="my-3">$ {{ number_format($producto->precio, 2) }}</h4>
        <p>Stock disponible: {{ $producto->stock }}</p>
        <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" value="1" min="1" required>
          </div>
          <button type="submit" class="btn btn-custom">
            <i class="bi bi-cart-plus me-1"></i> Agregar al carrito
          </button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
