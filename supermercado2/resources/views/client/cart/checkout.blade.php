@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Información de Envío</div>
            <div class="card-body">
                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label">Dirección de envío</label>
                        <select name="address_id" class="form-select">
                            @foreach(auth()->user()->addresses as $address)
                            <option value="{{ $address->id }}">
                                {{ $address->street }} #{{ $address->ext_number }}, {{ $address->neighborhood }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Método de pago</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" value="card" checked>
                            <label class="form-check-label">Tarjeta de crédito/débito</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" value="cash">
                            <label class="form-check-label">Efectivo al recibir</label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Confirmar pedido</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Resumen del pedido</div>
            <div class="card-body">
                <table class="table">
                    @foreach(Cart::content() as $item)
                    <tr>
                        <td>{{ $item->name }} x{{ $item->qty }}</td>
                        <td class="text-end">${{ number_format($item->subtotal, 2) }}</td>
                    </tr>
                    @endforeach
                    <tr class="fw-bold">
                        <td>Total</td>
                        <td class="text-end">${{ number_format(Cart::total(), 2) }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection