<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_producto', 'producto_id', 'pedido_id');
    }

    // 🔽 AÑADE ESTA FUNCIÓN
    public function necesitaReabastecimiento(): bool
    {
        return $this->stock <= $this->stock_minimo;
    }

    protected $fillable = [
        'nombre', 'descripcion', 'precio', 'stock', 'imagen', 'categoria', 'stock_minimo',
    ];
}


