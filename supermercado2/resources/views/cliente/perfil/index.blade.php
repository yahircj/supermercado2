<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mi Perfil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color:rgba(143, 195, 216, 0.81);;
      font-family: 'Segoe UI', sans-serif;
    }

    .profile-container {
      max-width: 600px;
      margin: auto;
      margin-top: 60px;
      background: white;
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
      animation: fadeIn 0.8s ease;
    }

    .profile-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .profile-header h2 {
      font-weight: 700;
      color: #2c3e50;
    }

    .profile-item {
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 1.1rem;
    }

    .profile-item i {
      font-size: 1.2rem;
      color: #0d6efd;
    }

    .btn-group-custom {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      justify-content: center;
      margin-top: 30px;
    }

    .btn-custom {
      border-radius: 30px;
      padding: 10px 20px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-custom:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1);
    }

    /* Animación de entrada */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="profile-container">
    <div class="profile-header">
      <h2><i class="bi bi-person-circle"></i> Mi Perfil</h2>
    </div>

    <!-- Mensajes de éxito o error -->
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Información del cliente -->
    <div class="profile-item">
      <i class="bi bi-person-fill"></i> <strong>Nombre:</strong> {{ $cliente->nombre }}
    </div>
    <div class="profile-item">
      <i class="bi bi-envelope-fill"></i> <strong>Correo:</strong> {{ $cliente->correo }}
    </div>
    <div class="profile-item">
      <i class="bi bi-telephone-fill"></i> <strong>Teléfono:</strong> {{ $cliente->telefono }}
    </div>
    <div class="profile-item">
      <i class="bi bi-geo-alt-fill"></i> <strong>Dirección:</strong> {{ $cliente->direccion }}
    </div>

    <!-- Botones -->
    <div class="btn-group-custom">
      <a href="{{ route('mis.pedidos', $cliente->id) }}" class="btn btn-info btn-custom">
        <i class="bi bi-box-seam"></i> Mis Pedidos
      </a>
      <a href="{{ route('historial.pedidos', $cliente->id) }}" class="btn btn-secondary btn-custom">
        <i class="bi bi-clock-history"></i> Historial de Pedidos
      </a>
      <a href="{{ route('perfil.edit', $cliente->id) }}" class="btn btn-primary btn-custom">
        <i class="bi bi-pencil-fill"></i> Editar Perfil
      </a>


      <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-danger btn-custom">
          <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
        </button>
      </form>



    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
