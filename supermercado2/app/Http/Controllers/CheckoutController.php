<?php

// namespace App\Http\Controllers;

// use App\Models\Order;
// use App\Models\Address;
// use Illuminate\Support\Facades\Auth;

// class CheckoutController extends Controller
// {
//     public function index()
//     {
//         if (Cart::count() === 0) {
//             return redirect()->route('cart.index');
//         }

//         return view('client.checkout', [
//             'addresses' => Auth::user()->addresses
//         ]);
//     }

//     public function store()
//     {
//         $order = Auth::user()->orders()->create([
//             'address_id' => request('address_id'),
//             'total' => Cart::total(),
//             'status' => 'pending'
//         ]);

//         foreach (Cart::content() as $item) {
//             $order->items()->create([
//                 'product_id' => $item->id,
//                 'product_name' => $item->name,
//                 'quantity' => $item->qty,
//                 'unit_price' => $item->price,
//                 'subtotal' => $item->subtotal
//             ]);

//             // Actualizar stock
//             $product = Product::find($item->id);
//             $product->decrement('stock', $item->qty);
//         }

//         Cart::destroy();

//         return redirect()->route('orders.show', $order)
//             ->with('success', 'Pedido completado con éxito');
//     }
// }