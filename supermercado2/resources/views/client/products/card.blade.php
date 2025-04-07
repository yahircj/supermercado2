<div class="card h-100">
    <img src="{{ $product->images->first()->image_path ?? 'https://via.placeholder.com/300' }}" 
         class="card-img-top" 
         alt="{{ $product->name }}">
    
    <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
        <p class="text-muted">{{ $product->category->name }}</p>
        <p class="card-text">${{ number_format($product->price, 2) }}</p>
        
        @if($product->stock > 0)
            <form action="{{ route('cart.add', $product) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">
                    Añadir al carrito
                </button>
            </form>
        @else
            <button class="btn btn-secondary" disabled>Agotado</button>
        @endif
    </div>
</div>