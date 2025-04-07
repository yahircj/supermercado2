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

    <div class="container py-4">
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
        <div class="d-flex justify-content-center">
            {{ $productos->appends(request()->query())->links() }}
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Supermercado El Buen Precio | Todos los derechos reservados</p>
        <p>Síguenos en
            <a href="#" style="color: var(--secondary-color);" class="footer-icon">
                <i class="bi bi-facebook"></i>
            </a> y
            <a href="#" style="color: var(--secondary-color);" class="footer-icon">
                <i class="bi bi-instagram"></i>
            </a>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
