<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Perfil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --primary: #4e73df;
      --danger: #e74a3b;
      --background: #f0f2f5;
      --card-bg: #ffffff;
      --text-color: #2c3e50;
      --border: #dee2e6;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: var(--background);
      color: var(--text-color);
    }

    .container {
      max-width: 600px;
      margin: 4rem auto;
      background-color: var(--card-bg);
      padding: 2.5rem;
      border-radius: 20px;
      box-shadow: 0 12px 28px rgba(0, 0, 0, 0.1);
      animation: slideIn 0.6s ease;
    }

    h2 {
      text-align: center;
      font-size: 2rem;
      margin-bottom: 2rem;
      color: var(--primary);
    }

    .form-label {
      font-weight: 600;
      margin-bottom: 0.5rem;
      display: block;
    }

    .form-control {
      width: 100%;
      padding: 0.75rem 1rem;
      border-radius: 10px;
      border: 1px solid var(--border);
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }

    .form-control:focus {
      border-color: var(--primary);
      outline: none;
      box-shadow: 0 0 5px rgba(78, 115, 223, 0.3);
    }

    .alert {
      padding: 1rem;
      background-color: var(--danger);
      color: #fff;
      border-radius: 10px;
      margin-bottom: 1.5rem;
      font-weight: 500;
    }

    .alert ul {
      margin: 0;
      padding-left: 1.2rem;
    }

    .btn {
      padding: 0.7rem 1.5rem;
      font-weight: bold;
      border-radius: 30px;
      text-decoration: none;
      border: none;
      transition: all 0.3s ease;
      cursor: pointer;
      font-size: 1rem;
    }

    .btn-primary {
      background-color: var(--primary);
      color: #fff;
    }

    .btn-secondary {
      background-color: #6c757d;
      color: #fff;
    }

    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .btn-group {
      display: flex;
      justify-content: space-between;
      margin-top: 2rem;
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(40px);
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
  <h2><i class="bi bi-pencil-square"></i> Editar Perfil</h2>

  @if ($errors->any())
  <div class="alert">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{ route('perfil.update', $cliente->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="correo" class="form-label">Correo</label>
      <input type="email" id="correo" name="correo" value="{{ old('correo', $cliente->correo) }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="telefono" class="form-label">Teléfono</label>
      <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="direccion" class="form-label">Dirección</label>
      <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $cliente->direccion) }}" class="form-control" required>
    </div>

    <div class="btn-group">
      <a href="{{ route('perfil.index') }}" class="btn btn-secondary">Regresar</a>
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
  </form>
</div>

</body>
</html>
