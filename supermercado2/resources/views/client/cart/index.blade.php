@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tu Carrito de Compras</h1>

    @if($items->isEmpty())
        <div class="alert alert-info">Tu carrito está vacío</div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>
                        <img src="{{ $item['options']['image'] }}" width="50" class="me-3">
                        {{ $item['name'] }}
                    </td>
                    <td>${{ number_format($item['price'], 2) }}</td>
                    <td>
                        <form action="{{ route('cart.update', $item['rowId']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="number" 
                                   name="quantity" 
                                   value="{{ $item['quantity'] }}" 
                                   min="1" 
                                   max="{{ $item['options']['stock'] }}"
                                   class="form-control" style="width: 80px">
                        </form>
                    </td>
                    <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $item['rowId']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-end">
            <div class="h5">Subtotal: ${{ number_format($subtotal, 2) }}</div>
            <div class="h5">IVA (16%): ${{ number_format($tax, 2) }}</div>
            <div class="h4 fw-bold">Total: ${{ number_format($total, 2) }}</div>
            
            <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg mt-3">
                Proceder al Pago
            </a>
        </div>
    @endif
</div>
@endsection