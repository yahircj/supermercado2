<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carrito de Compras</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-4">
        <h1 class="mb-4">Mi Carrito</h1>

        <!-- Botón para regresar a la tienda -->
        <a href="{{ url('/') }}" class="btn btn-primary mb-3">Regresar a la tienda</a>

        <!-- Mensaje de éxito -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (count($carrito) > 0)
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Producto</th>
                            <th style="width: 180px;">Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Subtotal</th>
                            <th style="width: 80px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carrito as $id => $item)
                            <tr>
                                <td>{{ $item['nombre'] }}</td>
                                <td>
                                    <form action="{{ route('carrito.actualizar', $id) }}" method="POST" class="d-flex">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="cantidad" value="{{ $item['cantidad'] }}"
                                            min="1" class="form-control me-2" style="width: 70px;">
                                        <button type="submit" class="btn btn-sm btn-success">Actualizar</button>
                                    </form>
                                </td>
                                <td>${{ number_format($item['precio'], 2) }}</td>
                                <td>${{ number_format($item['precio'] * $item['cantidad'], 2) }}</td>
                                <td>
                                    <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">🗑️</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mostrar total -->
            <p class="h5 text-end"><strong>Total: ${{ number_format($total, 2) }}</strong></p>

            <!-- Botón para realizar el pedido -->
            <div class="text-end mt-3">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pedidoModal">
                    Realizar pedido
                </button>
            </div>
        @else
            <p class="alert alert-info">Tu carrito está vacío.</p>
        @endif

<!-- Modal para ingresar los datos del pedido -->
<div class="modal fade" id="pedidoModal" tabindex="-1" aria-labelledby="pedidoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pedidoModalLabel">Realizar Pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <!-- Mostrar los errores de validación -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pedido.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" name="direccion" id="direccion" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo electrónico</label>
                        <input type="email" name="correo" id="correo" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombres" class="form-label">Nombres</label>
                        <input type="text" name="nombres" id="nombres" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="codigo_postal" class="form-label">Código Postal</label>
                        <input type="text" name="codigo_postal" id="codigo_postal" class="form-control" required>
                    </div>
                    <h6 class="mt-4">Datos de pago</h6>
                    <div class="mb-3">
                        <label for="numero_tarjeta" class="form-label">Número de Tarjeta</label>
                        <input type="text" name="numero_tarjeta" id="numero_tarjeta" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_caducidad" class="form-label">Fecha de Caducidad</label>
                        <input type="text" name="fecha_caducidad" id="fecha_caducidad" class="form-control" placeholder="MM/AA" required>
                    </div>
                    <div class="mb-3">
                        <label for="codigo_seguridad" class="form-label">Código de Seguridad (CVV)</label>
                        <input type="text" name="codigo_seguridad" id="codigo_seguridad" class="form-control" placeholder="XXX" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre_tarjeta" class="form-label">Nombre en la Tarjeta</label>
                        <input type="text" name="nombre_tarjeta" id="nombre_tarjeta" class="form-control" required>
                    </div>
                    <div class="modal-footer px-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Confirmar pedido</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle (incluye Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
