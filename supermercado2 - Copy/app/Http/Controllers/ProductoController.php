<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $query = Producto::query();
    
        if ($request->filled('buscar')) {
            $query->where('nombre', 'like', '%' . $request->buscar . '%');
        }
    
        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }
    
        $productos = $query->orderBy('nombre')->paginate(12);
        $categorias = Producto::select('categoria')->distinct()->pluck('categoria');
    
        return view('cliente.productos.index', compact('productos', 'categorias'));
    }
    

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('cliente.productos.show', compact('producto'));
    }
}
