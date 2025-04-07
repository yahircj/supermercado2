@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('client.products.filters') <!-- Filtros por departamento/categoría -->
    </div>
    <div class="col-md-9">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4 mb-4">
                @include('client.products.card')
            </div>
            @endforeach
        </div>
        
        {{ $products->links() }} <!-- Paginación -->
    </div>
</div>
@endsection