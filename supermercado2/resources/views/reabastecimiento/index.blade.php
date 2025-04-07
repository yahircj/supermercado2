@extends('layouts.app') <!-- Cámbialo si tu layout tiene otro nombre -->

@section('content')
    <div class="container">
        <h2 class="mb-4">🛒 Productos que necesitan reabastecimiento</h2>

        @if ($productos->isEmpty())
            <div class="alert alert-success">
                No hay productos que requieran reabastecimiento 🎉
            </div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Stock Actual</th>
                        <th>Stock Mínimo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>{{ $producto->stock_minimo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
