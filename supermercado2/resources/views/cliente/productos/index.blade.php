<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catálogo de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        :root {
            --primary-color: rgb(37, 164, 173);
            --secondary-color: #32cd32;
            --background: rgba(143, 195, 216, 0.81);
            --white: #fff;
            --text-dark: #333;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --radius: 12px;
            --footer-bg: #222;
        }

        body {
            background-color: var(--background);
            font-family: 'Segoe UI', sans-serif;
            color: var(--text-dark);
            margin-top: 60px;
        }

        /* Barra superior */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgb(10, 169, 175);
            backdrop-filter: blur(10px);
            z-index: 9999;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            padding: 10px 0;
        }

        .navbar:hover {
            background-color: rgb(12, 101, 143);
        }

        .navbar-brand {
            color: var(--white);
            font-size: 1.8rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .navbar-nav .nav-item {
            margin-left: 1rem;
        }

        .navbar-nav .nav-link {
            color: var(--white);
            font-weight: 600;
            padding: 8px 15px;
            border-radius: 30px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #fff;
            background-color: var(--primary-color);
        }

        /* Barra inferior */
        .footer {
            position: relative;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: var(--footer-bg);
            color: var(--white);
            text-align: center;
            padding: 1rem;
            box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Contenedor principal */
        .container {
            background-color: var(--white);
            padding: 2rem;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            margin-top: 80px;
        }

        h1 {
            font-weight: bold;
            font-size: 2.2rem;
            color: var(--primary-color);
            margin-bottom: 2rem;
        }

        /* Estilos del formulario de búsqueda */
        .search-form .form-control,
        .search-form .form-select {
            border: 2px solid var(--primary-color);
            border-radius: 30px;
            transition: box-shadow 0.2s ease-in-out;
        }

        .search-form .form-control:focus,
        .search-form .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(37, 164, 173, 0.3);
        }

        .search-form button.btn {
            border: none;
            border-radius: 30px;
            font-weight: 600;
        }

        /* Tarjetas de producto */
        .card {
            border: none;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            transition: transform 0.2s ease, opacity 0.3s ease;
        }

        .card:hover {
            transform: scale(1.03);
            opacity: 0.9;
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
            animation: fadeUp 1s ease forwards;
        }

        .animate-fade-up.delay-1 {
            animation-delay: 0.2s;
        }

        .animate-fade-up.delay-2 {
            animation-delay: 0.4s;
        }

        @media (max-width: 768px) {
            .card-img-top {
                height: 150px;
            }
        }
        .discount-categories .promo-card {
    background: linear-gradient(135deg,rgb(255, 230, 0), #fff9c4);
    color: #000;
    border-radius: 12px;
    padding: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}
.discount-categories .promo-card:hover {
    transform: translateY(-5px);
}
.promo-card h5 {
    font-weight: 300;
    margin-bottom: 10px;
}
.promo-card .promo-text {
    font-size: 1.4rem;
    color: #d32f2f;
}
.promo-card small {
    font-style: italic;
    color: #333;
}
.carousel-item {
  min-height: 10px;
}

.carousel-inner {
  border-radius: 130px;
  overflow: hidden;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  padding: 10px;
}
.navbar {
  margin-bottom: 0 !important;
}

.promo-section {
  margin-top: 0.5rem;
  margin-bottom: 1rem;
}

.container {
  padding-top: 1rem !important;
  padding-bottom: 1rem !important;
}



    </style>
</head>

<body>
    <!-- Barra superior -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Supermercado El Buen Precio</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('carrito.index') }}">
                        <i class="bi bi-cart-fill"></i> Carrito
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('perfil.index') }}">
                        <i class="bi bi-person-circle"></i> Perfil
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Carrusel de promociones -->
    <section class="promo-section py-3">
        <div class="container">
        <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded shadow-sm">
                    <div class="carousel-item active">
                        <div class="d-flex justify-content-around align-items-center flex-wrap px-4 py-3 bg-light rounded">
                            <img src="images/producto_1.jpg" class="img-fluid" style="max-height: 150px;" alt="Producto 1">
                            <div class="text-center mx-3">
                                <span class="badge bg-success mb-2">FULL · SÚPER</span>
                                <h3 class="fw-bold">SEMANA DE DESCUENTOS</h3>
                                <span class="badge bg-warning text-dark fs-5 mx-2">HASTA 50% DE DESCUENTO</span>
                                <span class="badge bg-dark text-white fs-5 mx-2">+10% DTO.*</span>
                                <p class="text-muted mt-2 fs-6">*Aplicando el cupón. Ver más en TyC.</p>
                            </div>
                            <img src="images/producto_2.jpg" class="img-fluid" style="max-height: 150px;" alt="Producto 2">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex justify-content-around align-items-center flex-wrap px-4 py-3 bg-light rounded">
                            <img src="images/producto_3.jpg" class="img-fluid" style="max-height: 150px;" alt="Producto 3">
                            <div class="text-center mx-3">
                                <span class="badge bg-success mb-2">FULL · SÚPER</span>
                                <h3 class="fw-bold">LECHE Y MANTEQUILLA CON DESCUENTO</h3>
                                <span class="badge bg-warning text-dark fs-5 mx-2">HASTA 20% DE DESCUENTO</span>
                                <span class="badge bg-dark text-white fs-5 mx-2">+10% DTO.*</span>
                                <p class="text-muted mt-2 fs-6">*Compra mínima de $300.00</p>
                            </div>
                            <img src="images/producto_4.jpg" class="img-fluid" style="max-height: 150px;" alt="Producto 4">
                        </div>
                    </div>
                </div>

                <!-- Botones de control -->
                <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
    </section>

    <div class="container py-2">
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
            <div class="container my-4">
  <div class="row g-3 text-center text-white discount-categories">
    <div class="col-md-3">
      <div class="promo-card bg-promo">
        <h5>Básicos del Súper</h5>
        <p class="promo-text">HASTA <strong>30% DTO.</strong></p>
        <small>Cereal Zucaritas</small>
      </div>
    </div>
    <div class="col-md-3">
      <div class="promo-card bg-promo">
        <h5>Papel de baño</h5>
        <p class="promo-text">HASTA <strong>15% DTO.</strong></p>
        <small>Papel Regio Luxury</small>
      </div>
    </div>
    <div class="col-md-3">
      <div class="promo-card bg-promo">
        <h5>Cuidado bucal</h5>
        <p class="promo-text">HASTA <strong>30% DTO.</strong></p>
        <small>Enjuague Listerine</small>
      </div>
    </div>
    <div class="col-md-3">
      <div class="promo-card bg-promo">
        <h5>Frutos secos</h5>
        <p class="promo-text">HASTA <strong>20% DTO.</strong></p>
        <small>Botana de nueces</small>
      </div>
    </div>
  </div>
</div>
        </section>

        <!-- Sección de búsqueda y filtro -->
        <form method="GET" action="{{ route('productos.index') }}" class="search-form mb-5">
            <div class="row g-2 align-items-end justify-content-center">
                <!-- Campo de búsqueda -->
                <div class="col-md-5">
                    <label for="buscar" class="form-label">Buscar</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" id="buscar" name="buscar" class="form-control"
                            placeholder="Ej: leche, arroz..." value="{{ request('buscar') }}">
                    </div>
                </div>
                <!-- Filtro por categoría -->
                <div class="col-md-4">
                    <label for="categoria" class="form-label">Categoría</label>
                    <select id="categoria" name="categoria" class="form-select">
                        <option value="">Todas las categorías</option>
                        @foreach ($categorias ?? [] as $categoria)
                            <option value="{{ $categoria }}"
                                {{ request('categoria') === $categoria ? 'selected' : '' }}>
                                {{ ucfirst($categoria) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- Botón de filtrar -->
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-funnel-fill me-1"></i> Filtrar
                    </button>
                </div>
            </div>
        </form>

        <!-- Listado de productos -->
        <div class="row">
            @foreach ($productos as $producto)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/' . $producto->imagen) }}" class="card-img-top"
                            alt="{{ $producto->nombre }}">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $producto->nombre }}</h5>
                                <p class="card-text">${{ number_format($producto->precio, 2) }}</p>
                            </div>
                            <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-primary mt-2">
                                <i class="bi bi-eye-fill me-1"></i> Ver más
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="row align-items-center my-3">
        <div class="d-flex justify-content-center">
  {{ $productos->appends(request()->query())->links('pagination::bootstrap-5') }}
</div>

<div class="footer">
  <p>&copy; 2025 Supermercado El Buen Precio | Todos los derechos reservados</p>
  <p>Síguenos en
    <a href="#" style="color:rgb(0, 0, 0);" class="footer-icon">
      <i class="bi bi-facebook"></i>
    </a> y
    <a href="#" style="color:rgb(0, 0, 0);" class="footer-icon">
      <i class="bi bi-instagram"></i>
    </a>
  </p>
</div>

<style>
  /* Hacemos que HTML y BODY ocupen toda la altura de la ventana */
  html, body {
    height: 100%;
    margin: 0;
  }

  /* Body usa flexbox para alinear contenido */
  body {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Asegura que el BODY ocupe toda la ventana */
  }

  /* Esta clase asegura que el contenido ocupe el espacio disponible entre el header y el footer */
  .content {
    flex: 1; /* Hace que el contenido ocupe todo el espacio entre el header y el footer */
  }

  /* Estilo para el footer */
  .footer {
    background-color: rgb(37, 164, 173); /* Fondo del footer */
    color: #fff; /* Color del texto */
    text-align: center;
    padding: 2rem 0; /* Padding para el footer */
    width: 100%; /* Asegura que el footer ocupe todo el ancho */
    font-size: 1rem; /* Tamaño de la fuente */
  }

  .footer p {
    margin: 0.5rem 0;
  }

  .footer a {
    text-decoration: none;
    margin: 0 0.5rem;
    font-size: 1.5rem; /* Tamaño de los iconos */
  }

  .footer-icon {
    transition: transform 0.3s ease;
  }

  .footer-icon:hover {
    transform: scale(1.1); /* Efecto de zoom al pasar el ratón */
  }
</style>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
