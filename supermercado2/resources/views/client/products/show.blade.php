@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <!-- Galería de imágenes -->
        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($product->images as $key => $image)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <img src="{{ $image->image_path }}" class="d-block w-100" alt="{{ $product->name }}">
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
    
    <div class="col-md-6">
        <h1>{{ $product->name }}</h1>
        <p class="text-muted">{{ $product->category->department->name }} > {{ $product->category->name }}</p>
        
        <div class="mb-3">
            <span class="h4">${{ number_format($product->price, 2) }}</span>
            <span class="badge bg-{{ $product->stock > 0 ? 'success' : 'danger' }}">
                {{ $product->stock > 0 ? 'Disponible' : 'Agotado' }}
            </span>
        </div>
        
        <p>{{ $product->description }}</p>
        
        @if($product->stock > 0)
        <form action="{{ route('cart.add', $product) }}" method="POST" class="row g-3">
            @csrf
            <div class="col-auto">
                <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="form-control">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Añadir al carrito</button>
            </div>
        </form>
        @endif
    </div>
</div>

<!-- Productos relacionados -->
<div class="mt-5">
    <h3>Productos relacionados</h3>
    <div class="row">
        @foreach($relatedProducts as $product)
        <div class="col-md-3">
            @include('client.products.card', ['product' => $product])
        </div>
        @endforeach
    </div>
</div>
@endsection