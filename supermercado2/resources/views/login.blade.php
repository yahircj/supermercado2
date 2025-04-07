<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesión | Supermercado El Buen Precio</title>
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

    .login-card {
      background: #fff;
      padding: 2rem;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      width: 100%;
      max-width: 420px;
      animation: fadeInUp 0.7s ease-out;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(40px);
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

    .welcome-message {
      text-align: center;
      margin-bottom: 1rem;
      color: var(--primary-color);
    }

    .welcome-message h2 {
      font-weight: bold;
      animation: fadeInText 1.2s ease-in-out;
    }

    .welcome-message p {
      font-size: 0.95rem;
      animation: fadeInText 1.5s ease-in-out;
    }

    @keyframes fadeInText {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .input-group-text {
      background-color: var(--light-bg);
      border-right: none;
    }

    .form-control {
      border-left: none;
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

  <div class="login-card">
    <div class="welcome-message">
      <h2><i class="bi bi-shop-window me-2"></i>Bienvenido de nuevo</h2>
      <p>Ingresa tus datos para acceder a <strong>Supermercado El Buen Precio</strong></p>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
          <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
          <input type="password" name="password" class="form-control" required>
        </div>
      </div>

      <button type="submit" class="btn btn-custom w-100 mt-2">
        <i class="bi bi-box-arrow-in-right me-1"></i> Iniciar sesión
      </button>

      <p class="mt-3 text-center">¿No tienes cuenta? 
        <a href="{{ route('register') }}">
          <i class="bi bi-person-plus-fill me-1"></i>Registrarse
        </a>
      </p>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
