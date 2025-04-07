<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'images'])
            ->filter(request(['search', 'category']))
            ->paginate(12);

        return view('client.products.index', [
            'products' => $products,
            'categories' => Category::all()
        ]);
    }

    public function show(Product $product)
    {
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->with('images')
            ->limit(4)
            ->get();

        return view('client.products.show', [
            'product' => $product->load('images', 'category.department'),
            'relatedProducts' => $relatedProducts
        ]);
    }
}