<?php

// namespace App\Http\Controllers;

// use App\Models\Order;

// class OrderController extends Controller
// {
//     public function index()
//     {
//         $orders = auth()->user()->orders()
//             ->with('items')
//             ->latest()
//             ->paginate(10);

//         return view('client.orders.index', compact('orders'));
//     }

//     public function show(Order $order)
//     {
//         $this->authorize('view', $order);

//         return view('client.orders.show', [
//             'order' => $order->load('items', 'address')
//         ]);
//     }
// }