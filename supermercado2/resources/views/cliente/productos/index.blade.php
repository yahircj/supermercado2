<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Catálogo de Productos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"/>
  
  <style>
    :root {
      --primary-color: #3483fa;
      --secondary-color: #00a650;
      --background: #f2f3f4;
      --white: #fff;
      --text-dark: #333;
      --text-light: #666;
      --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      --radius: 12px;
    }

    body {
      background-color: var(--background);
      font-family: 'Segoe UI', sans-serif;
      color: var(--text-dark);
    }

    .container {
      background-color: var(--white);
      padding: 2rem;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
    }

    h1 {
      font-weight: bold;
      font-size: 2.2rem;
      color: var(--primary-color);
      margin-bottom: 2rem;
    }

    /* Estilos de los botones principales */
    .btn-outline-success, .btn-outline-primary {
      border-radius: 30px;
      font-weight: 600;
    }

    .btn-primary {
      background-color: var(--primary-color);
      border: none;
      border-radius: 10px;
      font-weight: 500;
    }

    .btn-primary:hover {
      background-color: #2968c8;
    }

    .btn-secondary {
      border-radius: 10px;
    }

    .form-control, .form-select {
      border-radius: 10px;
      box-shadow: none !important;
    }

    /* Tarjetas de productos */
    .card {
      border: none;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      transition: transform 0.2s ease;
    }

    .card:hover {
      transform: scale(1.03);
    }

    .card-img-top {
      height: 200px;
      object-fit: contain;
      background-color: #f9f9f9;
      padding: 1rem;
      border-bottom: 1px solid #eee;
    }

    .card-title {
      font-size: 1.1rem;
      font-weight: 600;
    }

    .card-text {
      font-size: 1.3rem;
      font-weight: bold;
      color: var(--text-dark);
    }

    /* Paginación estilizada */
    .pagination {
      justify-content: center;
      margin-top: 2rem;
    }

    .page-link {
      border-radius: 50px !important;
      margin: 0 0.3rem;
      color: var(--primary-color);
      border: 1px solid var(--primary-color);
      font-weight: 500;
    }

    .page-link:hover {
      background-color: var(--primary-color);
      color: white;
    }

    .page-item.active .page-link {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
      color: white;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .card-img-top {
        height: 150px;
      }
    }
    .info-section {
  background: #f9f9f9;
  padding: 2.5rem;
  border-radius: 16px;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
}

.info-title {
  font-size: 2rem;
  font-weight: 700;
  color: #333;
}

.info-title .highlight {
  color: var(--primary-color);
}

.info-subtitle {
  color: var(--text-light);
  font-size: 1.1rem;
  margin-bottom: 2rem;
}

/* Animaciones */
@keyframes fadeUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-up {
  opacity: 0;
  animation: fadeUp 0.8s ease forwards;
}

.animate-fade-up.delay-1 {
  animation-delay: 0.2s;
}

.animate-fade-up.delay-2 {
  animation-delay: 0.4s;
}

  </style>
</head>
<body>
  <div class="container py-4">

    <!-- Carrito y perfil -->
    <div class="d-flex justify-content-between mb-3">
      <a href="{{ route('carrito.index') }}" class="btn btn-outline-success">
        🛒 Ver carrito
      </a>
      <a href="{{ route('perfil.index') }}" class="btn btn-outline-primary">
        <i class="bi bi-person-circle"></i> Perfil
      </a>
    </div>

    <h1 class="text-center">Catálogo de Productos</h1>
    <!-- Sección informativa -->
<section class="info-section my-5">
  <div class="text-center mb-4">
    <h2 class="info-title">¿Por qué elegir <span class="highlight">Supermercado El Buen Precio</span>?</h2>
    <p class="info-subtitle">Calidad, confianza y ahorro para tu familia</p>
  </div>
  <div class="row text-center">
    <div class="col-md-4 mb-4 animate-fade-up">
      <i class="bi bi-truck fs-1 text-primary"></i>
      <h5 class="mt-3">Envío Rápido</h5>
      <p>Entregamos tus productos en tiempo récord, directo a tu puerta.</p>
    </div>
    <div class="col-md-4 mb-4 animate-fade-up delay-1">
      <i class="bi bi-piggy-bank fs-1 text-success"></i>
      <h5 class="mt-3">Precios Competitivos</h5>
      <p>Ofertas todos los días para que tu dinero rinda más.</p>
    </div>
    <div class="col-md-4 mb-4 animate-fade-up delay-2">
      <i class="bi bi-award fs-1 text-warning"></i>
      <h5 class="mt-3">Productos de Calidad</h5>
      <p>Solo trabajamos con marcas confiables y productos frescos.</p>
    </div>
  </div>
</section>


    <!-- Filtros -->
    <form method="GET" class="row mb-4">
      <div class="col-md-4 mb-2">
        <input type="text" name="buscar" class="form-control" placeholder="Buscar producto..." value="{{ request('buscar') }}">
      </div>
      <div class="col-md-4 mb-2">
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
      <div class="col-md-4 d-flex mb-2">
        <button type="submit" class="btn btn-primary me-2 w-50">Filtrar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary w-50">Limpiar</a>
      </div>
    </form>

    <!-- Productos -->
    <div class="row">
      @foreach ($productos as $producto)
          <div class="col-md-3 mb-4">
              <div class="card h-100">
                  <img src="{{ asset('images/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                  <div class="card-body d-flex flex-column justify-content-between">
                      <div>
                          <h5 class="card-title">{{ $producto->nombre }}</h5>
                          <p class="card-text">${{ number_format($producto->precio, 2) }}</p>
                      </div>
                      <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-primary mt-2">Ver más</a>
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
