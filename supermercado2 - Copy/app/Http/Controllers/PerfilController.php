<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Producto;

class PerfilController extends Controller
{
    public function index()
    {
        $cliente = Cliente::find(1);  // Buscar al cliente con ID 1

        if (!$cliente) {
            return redirect('/')->with('error', 'Usuario no encontrado');
        }

        return view('cliente.perfil.index', compact('cliente'));
    }
    public function edit($id)
    {
        // Aseguramos que recibimos el ID y lo usamos para obtener el cliente
        $cliente = Cliente::findOrFail($id);  // Si no lo encuentra, lanzará un error 404

        return view('cliente.perfil.edit', compact('cliente'));  // Mandamos la información al formulario
    }

    public function update(Request $request, $id)
    {
        // Validamos los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
        ]);

        // Encontramos al cliente con el ID proporcionado
        $cliente = Cliente::findOrFail($id);

        // Actualizamos la información del cliente
        $cliente->update($request->all());

        // Redirigimos al perfil con un mensaje de éxito
        return redirect()->route('perfil.index')->with('success', 'Perfil actualizado correctamente.');
    }

    public function misPedidos($clienteId)
    {
        $cliente = Cliente::find($clienteId);
        $pedidos = Pedido::where('cliente_id', $clienteId)
                        ->whereIn('estatus', ['Procesando', 'Enviado'])
                        ->get();
        
        return view('cliente.perfil.mis_pedidos', compact('pedidos', 'cliente'));
    }
    
    public function historialPedidos($clienteId)
    {
        $cliente = Cliente::find($clienteId);
        $pedidos = Pedido::where('cliente_id', $clienteId)
                        ->where('estatus', 'Entregado')
                        ->get();
        
        return view('cliente.perfil.historial', compact('pedidos', 'cliente'));
    }
    
    
    public function showPedido($id)
    {
        $pedido = Pedido::with('productos')->findOrFail($id);

        return view('cliente.perfil.show_pedido', compact('pedido'));
    }

    public function showProducto($id)
    {
        $producto = Producto::findOrFail($id);

        return view('cliente.productos.show', compact('producto'));
    }
}
