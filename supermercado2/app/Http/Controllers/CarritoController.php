<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function index()
    {
        // Obtener el carrito desde la sesión
        $carrito = session()->get('carrito', []);

        // Calcular el total del carrito
        $total = array_reduce($carrito, function ($carry, $item) {
            return $carry + ($item['precio'] * $item['cantidad']);
        }, 0);

        // Pasar los productos y el total a la vista
        return view('cliente.carrito.index', compact('carrito', 'total'));
    }

    public function agregar(Request $request, Producto $producto)
    {
        $cantidad = (int) $request->input('cantidad', 1);
    
        $carrito = session()->get('carrito', []);
    
        if (isset($carrito[$producto->id])) {
            $carrito[$producto->id]['cantidad'] += $cantidad;
        } else {
            $carrito[$producto->id] = [
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => $cantidad
            ];
        }
    
        session()->put('carrito', $carrito);
    
        return redirect()->route('carrito.index')->with('success', 'Producto agregado al carrito.');
    }
    

    public function actualizar(Request $request, $id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad'] = $request->cantidad;
            session()->put('carrito', $carrito);
        }

        return back()->with('success', 'Carrito actualizado');
    }

    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);

        unset($carrito[$id]);

        session()->put('carrito', $carrito);

        return back()->with('success', 'Producto eliminado');
    }
}
