<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(protected CartService $cart) {}

    /**
     * Muestra el contenido del carrito
     */
    public function index()
    {
        return view('client.cart.index', [
            'items' => $this->cart->content(),
            'subtotal' => $this->cart->subtotal(),
            'tax' => $this->cart->tax(),
            'total' => $this->cart->total()
        ]);
    }

    /**
     * Añade un producto al carrito
     */
    public function add(Product $product)
    {
        $validated = request()->validate([
            'quantity' => 'required|integer|min:1|max:'.$product->stock
        ]);

        $this->cart->add(
            product: $product,
            quantity: $validated['quantity'],
            options: [
                'image' => $product->images->first()?->image_path,
                'sku' => $product->sku,
                'stock' => $product->stock
            ]
        );

        return back()->with('success', 'Producto añadido al carrito');
    }

    /**
     * Actualiza la cantidad de un producto
     */
    public function update($rowId)
    {
        $validated = request()->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        if (!$this->cart->update($rowId, $validated['quantity'])) {
            return back()->with('error', 'No hay suficiente stock disponible');
        }

        return back()->with('success', 'Carrito actualizado');
    }

    /**
     * Elimina un producto del carrito
     */
    public function remove($rowId)
    {
        $this->cart->remove($rowId);

        return back()->with('success', 'Producto eliminado del carrito');
    }

    /**
     * Vacía completamente el carrito
     */
    public function clear()
    {
        $this->cart->clear();

        return redirect()->route('cart.index')
            ->with('success', 'Carrito vaciado');
    }

    /**
     * Muestra el resumen del carrito (para AJAX/APIs)
     */
    public function summary()
    {
        return response()->json([
            'count' => $this->cart->count(),
            'subtotal' => $this->cart->subtotal(),
            'formatted_subtotal' => number_format($this->cart->subtotal(), 2),
            'tax' => $this->cart->tax(),
            'total' => $this->cart->total()
        ]);
    }
}