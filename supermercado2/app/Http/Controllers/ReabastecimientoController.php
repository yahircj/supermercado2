<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class ReabastecimientoController extends Controller
{
    public function index()
    {
        // Obtener productos que necesitan reabastecimiento
        $productos = Producto::all()->filter(function ($producto) {
            return $producto->necesitaReabastecimiento();
        });

        return view('reabastecimiento.index', compact('productos'));
    }
}
