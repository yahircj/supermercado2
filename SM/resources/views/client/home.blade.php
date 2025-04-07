@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h2>Productos Destacados</h2>
        <div class="row">
            @foreach($featuredProducts as $product)
            <div class="col-md-4 mb-4">
                @include('client.products.card', ['product' => $product])
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Ofertas Especiales</div>
            <div class="card-body">
                <!-- Contenido de ofertas -->
            </div>
        </div>
    </div>
</div>
@endsection