<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Formulario')</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container my-4">

    <h1 class="mb-4">@yield('header', 'Formulario Universal')</h1>

    <!-- Botón de regreso (opcional) -->
    @hasSection('back_button')
      @yield('back_button')
    @else
      <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">← Regresar</a>
    @endif

    <!-- Mensajes de sesión -->
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Contenido dinámico -->
    @yield('content')

    <!-- Modal opcional -->
    @hasSection('modal')
      @yield('modal')
    @endif

  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
