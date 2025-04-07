<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Department;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::with(['category', 'images'])
            ->where('stock', '>', 0)
            ->inRandomOrder()
            ->limit(8)
            ->get();

        return view('client.home', [
            'featuredProducts' => $featuredProducts,
            'departments' => Department::with('categories')->get()
        ]);
    }
}