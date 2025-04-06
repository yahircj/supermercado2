<?php

// app/Http/Controllers/PedidoController.php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'direccion' => 'required|string|max:255',
            'correo' => 'required|email',
            'telefono' => 'required|string|max:20',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'codigo_postal' => 'required|string|max:10',
            'numero_tarjeta' => 'required|string|max:20',
            'fecha_caducidad' => 'required|string|max:5',
            'codigo_seguridad' => 'required|string|max:4',
            'nombre_tarjeta' => 'required|string|max:100',
        ]);

        // Obtén el carrito de la sesión
        $carrito = session()->get('carrito', []);

        // Calcular el total del pedido
        $total = array_reduce($carrito, function ($carry, $item) {
            return $carry + ($item['precio'] * $item['cantidad']);
        }, 0);

        // Crear el pedido
        $pedido = Pedido::create([
            'cliente_id' => 1, // Asegúrate de usar el cliente correcto
            'direccion' => $request->direccion,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'codigo_postal' => $request->codigo_postal,
            'total' => $total,
        ]);

        // Limpiar el carrito después de realizar el pedido
        session()->forget('carrito');

        // Redirigir con un mensaje de éxito
        return redirect()->route('carrito.index')->with('success', 'Pedido realizado con éxito.');
    }
}
