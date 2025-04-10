<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrarse | Supermercado El Buen Precio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: rgb(37, 164, 173);
      --secondary-color: #32cd32;
      --light-bg: #f8f9fa;
      --shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      --radius: 15px;
    }

    body {
      background: linear-gradient(135deg, #c8f4f9, #e0ffe0);
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .register-card {
      background: #fff;
      padding: 2rem;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      width: 100%;
      max-width: 420px;
      animation: fadeInUp 0.6s ease-out;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .form-label {
      font-weight: 600;
    }

    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 0.2rem rgba(37, 164, 173, 0.25);
    }

    .btn-custom {
      background-color: var(--primary-color);
      color: white;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-custom:hover {
      background-color: #2c8a92;
      transform: scale(1.02);
    }

    .register-title {
      font-weight: bold;
      color: var(--primary-color);
    }

    .input-group-text {
      background-color: var(--light-bg);
      border-right: none;
    }

    .form-control {
      border-left: none;
    }

    .alert {
      font-size: 0.95rem;
    }

    a {
      color: var(--secondary-color);
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="register-card">
    <h3 class="mb-4 text-center register-title">
      <i class="bi bi-person-plus-fill me-2"></i>Registrarse
    </h3>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li><i class="bi bi-exclamation-circle me-1"></i>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nombre completo</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
          <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
        </div>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
          <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
        </div>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>
      </div>

      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
      </div>

      <button type="submit" class="btn btn-custom w-100 mt-2">
        <i class="bi bi-check-circle-fill me-1"></i> Registrarse
      </button>

      <p class="mt-3 text-center">¿Ya tienes cuenta?
        <a href="{{ route('login') }}">
          <i class="bi bi-box-arrow-in-right me-1"></i>Iniciar sesión
        </a>
      </p>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>